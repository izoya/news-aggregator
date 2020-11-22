<?php

namespace App\Listeners;

use App\Events\ParseNewsEvent;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\QueryException;
use Illuminate\Queue\InteractsWithQueue;
use Str;

class ParsedNewsSaveListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(ParseNewsEvent $event)
    {
//        foreach ($event->data as $data) {
//            TODO insert code from below here
//        }

        $data = $event->data[0];  //temp

        $source = Source::query()->where('name', 'like', $data['title'])->first();
        if (is_null($source)) {
            $source = $this->createSource($data);
        }

        $category = Category::query()->where('title', 'like', $data['category'])->first();
        if (is_null($category)) {
            $category = $this->createCategory($data);
        }

        foreach ($data['news'] as $newsData) {
            $slug = Str::slug($newsData['title']);
            $news = News::query()->where('slug', '=', $slug)->firstOrNew();

            if (empty($news->id)) {
                $newsData['source_id'] = $source->id;
                $news = $this->createNews($newsData);

                if ($news) {
                    $news->categories()->sync($category->id);
                }
            }
        }
    }

    private function createSource(array $data)
    {
        $source = new Source();
        $source->name = $data['title'];
        $source->link = $data['link'];
        $source->description = $data['description'];
        $source->save();

        return $source;
    }

    private function createCategory(array $data)
    {
        $category = new Category();
        $category->title = $data['category'];
        $category->slug = Str::slug($data['category']);
        $category->description = $data['description'];
        $category->save();

        return $category;
    }

    /**
     * @param array $newsData
     * @return News|false
     */
    private function createNews(array $newsData)
    {
        $news = new News();
        $news->title = $newsData['title'];
        $news->slug = Str::slug($newsData['title']);
        $news->image = $newsData['image'];
        $news->description = $newsData['description'];
        $news->link = $newsData['link'];
        $news->created_at = $newsData['pubDate'];
        $news->source_id = $newsData['source_id'];


        try {
            $news->save();
        } catch (QueryException $e) {
            session()->put('error', __('sessions.error.dbError', [
                'code' => $e->errorInfo[2],
            ]));
            return false;
        }

        return $news;
    }
}

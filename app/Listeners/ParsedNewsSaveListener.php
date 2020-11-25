<?php

namespace App\Listeners;

use App\Events\ParseNewsEvent;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\QueryException;
use Illuminate\Queue\InteractsWithQueue;
use Log;
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
        foreach ($event->data as $data) {

            $source = Source::query()->firstOrCreate([
                'name'        => $data['title'],
                'link'        => $data['link'],
                'description' => $data['description'],
                'image'       => $data['image'],
            ]);

            $category = Category::query()->firstOrCreate([
                'title'       => $data['category'],
                'slug'        => Str::slug($data['category']),
                'description' => $data['description'],
            ]);

            foreach ($data['news'] as $newsData) {

                $slug = Str::of($newsData['title'])->slug()->limit(100, '');

                if (News::query()->where('slug', $slug)->doesntExist()) {

                    $description = Str::of(strip_tags($newsData['description']))->limit(252);
                    $title = Str::of($newsData['title'])->limit(97);
                    $image = $newsData['image'] ?? optional($source)->image;

                    try {
                        News::query()->create([
                            'title'       => $title,
                            'slug'        => $slug,
                            'image'       => $image,
                            'description' => $description,
                            'source_id'   => $source->id,
                            'created_at'  => $newsData['pubDate'],
                            'link'        => $newsData['link'],
                        ])
                            ->categories()->attach($category->id);

                    } catch (QueryException $e) {
                        Log::error(__CLASS__ . ' - ' . $e->getMessage());
                    }
                }
            }
        }
    }
}

<?php


namespace App\Services;


use App\Models\Category;
use App\Models\News;
use App\Models\Feed;
use App\Models\Source;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Laravie\Parser\InvalidContentException;
use Log;
use Str;
use XmlParser;


class ParsingService
{
    protected $data = [];
    /** @var Feed  */
    protected $feed;

    /**
     * ParsingService constructor.
     * @param Feed $feed
     */
    public function __construct(Feed $feed)
    {
        $this->feed = $feed;
    }


    private function parseData(): bool
    {
        try {
            $xml = XmlParser::load($this->feed->link);
        } catch (InvalidContentException $e) {
            Log::error($e->getMessage());
            return false;
        }

        $this->data = $xml->rebase('channel')->parse([
            'title' => ['uses' => 'title'],
            'link' => ['uses' => 'link'],
            'description' => ['uses' => 'description'],
            'image' => ['uses' => 'image.url'],
            'category' => ['uses' => 'item.category'],
            'news' => ['uses' =>
                'item[title,description,guid>link,pubDate,enclosure::url>image1,image.url>image2]'
            ],
        ]);

        return true;
    }


    public function saveData(): void
    {
        $this->parseData();

        $source = $this->setSource();
        $category = $this->setCategory();

        foreach ($this->data['news'] as $newsData) {

            $description = Str::of(trim(strip_tags($newsData['description'])))->limit(252);
            $title = Str::of($newsData['title'] ?? $description)->limit(97);

            if (empty($newsData['link']) || empty($title)) {
                Log::info(__CLASS__ . ' - corrupted data: ' . $this->feed->link);
                continue;
            }

            $slug  = Str::of($title)->slug()->limit(100, '');

            if (News::query()->where('slug', $slug)->doesntExist()) {
                Log::info($newsData);
                $image = $newsData['image1'] ?? $newsData['image2']?? $source->image;
                $date = $newsData['pubDate'] ?? Carbon::now();

                try {
                    News::query()->create(['title' => $title,
                        'slug'        => $slug,
                        'image'       => $image,
                        'link'        => $newsData['link'],
                        'description' => $description,
                        'source_id'   => $source->id,
                        'created_at'  => $date,
                        ])
                        ->categories()->attach($category->id);
                }
                catch (QueryException $e) {
                    Log::error(__CLASS__ . ' - ' . $e->getMessage());
                }
            }
        }
    }

    /**
     * Return existent source by name or newly created from parsing data
     *
     * @return Source|null
     */
    private function setSource(): ?Source
    {
        $sourceName = $this->data['title'] ?? $this->feed->title;

        $source = Source::whereName($sourceName)->first();

        if (!$source) {
            $source = Source::create([
                'name' => $sourceName,
                'link' => $this->data['link'],
                'description' => $this->data['description'],
                'image' => $this->data['image'],
            ]);
        }

        return $source;
    }

    /**
     * Return existent category by slug or newly created from parsing data
     *
     * @return Category|null
     */
    private function setCategory(): ?Category
    {
        $categoryTitle = $this->feed->category ?? $this->data['category'];
        $slug = Str::slug($categoryTitle);
        $category = Category::whereSlug($slug)->first();

        if (!$category) {
            $category = Category::create([
                'title' => $categoryTitle,
                'slug' => $slug,
                'description' => $this->data['description'],]);
        }

        return $category;
    }
}

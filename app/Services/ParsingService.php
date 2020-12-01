<?php


namespace App\Services;


use App\Models\Category;
use App\Models\News;
use App\Models\Resource;
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
    /** @var Resource  */
    protected $resource;

    /**
     * ParsingService constructor.
     * @param Resource $resource
     */
    public function __construct(Resource $resource)
    {
        $this->resource = $resource;
    }


    private function parseData(): bool
    {
        try {
            $xml = XmlParser::load($this->resource->link);
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
            'news' => ['uses' => 'item[title,description,guid>link,pubDate,enclosure::url>image]'],
        ]);

        return true;
    }


    public function saveData(): void
    {
        $this->parseData();

        $source = Source::query()->firstOrCreate([
            'name'        => $this->data['title'] ?? $this->resource->title,
            'link'        => $this->data['link'],
            'description' => $this->data['description'],
            'image'       => $this->data['image'],
            ]);

        $categoryTitle = $this->resource->category ?? $this->data['category'];
        $category = Category::query()->firstOrCreate([
            'title'       => $categoryTitle,
            'slug'        => Str::slug($categoryTitle),
            'description' => $this->data['description'],]);

        foreach ($this->data['news'] as $newsData) {

            $description = Str::of(trim(strip_tags($newsData['description'])))->limit(252);
            $title = Str::of($newsData['title'] ?? $description)->limit(97);

            if (empty($newsData['link']) || empty($title)) {
                Log::info(__CLASS__ . ' - corrupted data: ' . $this->resource->link);
                continue;
            }

            $slug  = Str::of($title)->slug()->limit(100, '');

            if (News::query()->where('slug', $slug)->doesntExist()) {

                $image = $newsData['image'] ?? optional($source)->image;
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
}

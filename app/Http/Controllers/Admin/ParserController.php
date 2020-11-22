<?php

namespace App\Http\Controllers\Admin;

use App\Events\ParseNewsEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravie\Parser\InvalidContentException;
use XmlParser;

class ParserController extends Controller
{

    public $rssList = [
        [
            'link' => '/home/vagrant/code/laravel/storage/feed.rss',
            'category' => 'Culture',
        ],
//        [
//            'link' => 'https://www.bbc.com/culture/feed.rss',
//            'category' => 'Culture',
//        ],
//        [
//            'link' => 'https://abcnews.go.com/abcnews/internationalheadlines',
//            'category' => 'World',
//        ],
//        [
//            'link' => 'http://rss.cnn.com/rss/cnn_travel.rss',
//            'category' => 'Travel',
//        ],
    ];

    public function index()
    {


        $data = $this->getParsedData();

        if (count($data)) {
            event(new ParseNewsEvent($data));
        }
        session()->remove('error');
        if (session('error')) {
            return back();
        }

        return redirect()->route('admin.news.index')
            ->with('success', __('sessions.success.parsedNews', ['count' => count($data)]));
    }

    private function getParsedData(array $rssList = null): array
    {
        $rssList = $rssList ?? $this->rssList;

        $data = [];
        foreach ($rssList as $rss) {
            $parseResult = $this->parseData($rss['link']);
            if (count($parseResult)) {
                $parseResult['category'] = $rss['category'];
                $data[] = $parseResult;
            }
        }

        return $data;
    }

    private function parseData(string $url): array
    {
        try {
            $xml = XmlParser::load($url);
        } catch (InvalidContentException $e) {
            return [];
        }

        return $xml->rebase('channel')->parse([
            'title' => ['uses' => 'title'],
            'link' => ['uses' => 'link'],
            'description' => ['uses' => 'description'],
            'image' => ['uses' => 'image.url'],
            'category' => ['uses' => 'item.category'],
            'news' => [
                'uses' => 'item[title,description,link,pubDate,enclosure::url>image]',
            ],
        ]);
    }


}

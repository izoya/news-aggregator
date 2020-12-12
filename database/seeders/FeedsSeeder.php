<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class FeedsSeeder extends Seeder
{
    public $rssList = [
        [
            'link' => 'https://www.bbc.com/culture/feed.rss',
            'category' => 'Culture',
            'title' => 'BBC Culture',
        ],
        [
            'link' => 'https://abcnews.go.com/abcnews/internationalheadlines',
            'category' => 'World',
            'title' => 'ABC News International',
        ],
        [
            'link' => 'http://rss.cnn.com/rss/cnn_travel.rss',
            'category' => 'Travel',
            'title' => 'CNN Travel',
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feeds')->insert($this->getData());
    }

    private function getData()
    {
        $data = [];

        foreach ($this->rssList as $rss) {
            $data[] = [
                'title' => $rss['title'],
                'link' => $rss['link'],
                'category' => $rss['category'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        return $data;
    }
}

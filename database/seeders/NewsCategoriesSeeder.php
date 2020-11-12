<?php

namespace Database\Seeders;

use DB;
use Faker\Factory;
use Illuminate\Database\Seeder;

class NewsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_categories')->insert($this->getData());
    }

    private function getData()
    {
        $data = [];

        for($i=1; $i <= 60; $i++) {
            $data[] = [
                'category_id' => mt_rand(1, 6),
                'news_id' => $i,
            ];
        }

        return $data;
    }
}

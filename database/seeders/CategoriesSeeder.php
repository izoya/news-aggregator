<?php

namespace Database\Seeders;

use DB;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData()
    {
        $faker = Factory::create('en_US');
        $titles = ['Tech', 'Business', 'Education', 'Sport', 'Entertainment', 'Lifestyle'];
        $data = [];

        for($i=0; $i < count($titles); $i++) {
            $data[] = [
                'title' => $titles[$i],
                'slug' => Str::slug($titles[$i]),
                'description' => $faker->optional()->realText(mt_rand(100, 200)),
            ];
        }

        return $data;
    }
}

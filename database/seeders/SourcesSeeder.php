<?php

namespace Database\Seeders;

use DB;
use Faker\Factory;
use Illuminate\Database\Seeder;

class SourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sources')->insert($this->getData());
    }

    private function getData()
    {
        $faker = Factory::create('en_US');
        $data[] = [
            'name' => 'Admin',
            'link' => null,
            'description'=> null,
        ];

        for ($i = 0; $i < 9; $i++) {
            $data[] = [
                'name' => $faker->catchPhrase,
                'link' => $faker->url,
                'description' => $faker->optional(0.9)->realText(mt_rand(50, 200)),
            ];
        }

        return $data;
    }
}


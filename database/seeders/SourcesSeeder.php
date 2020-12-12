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

    private function getData(): array
    {
        $faker = Factory::create('en_US');
        $data[] = [
            'name' => 'Admin',
            'link' => null,
            'description'=> 'A wonderful admin here gets you the most interesting news ever!',
        ];

        for ($i = 0; $i < 2; $i++) {
            $data[] = [
                'name' => $faker->catchPhrase,
                'link' => $faker->url,
                'description' => $faker->optional(0.9)->realText(mt_rand(50, 200)),
            ];
        }

        return $data;
    }
}


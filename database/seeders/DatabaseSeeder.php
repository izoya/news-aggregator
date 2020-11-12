<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(CategoriesSeeder::class);
//        $this->call(SourcesSeeder::class);
        $this->call(NewsSeeder::class);
//        $this->call(NewsCategoriesSeeder::class);

        // \App\Models\User::factory(10)->create();
    }
}

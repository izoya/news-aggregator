<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->catchPhrase;
        $content = $this->faker->realText(mt_rand(300, 500));
        return [
            'title' => $title,
            'slug' => $this->faker->unique()->passthrough(Str::slug(Str::limit($title, 50))),
            'image' => $this->faker->image('public/images/news', 300, 150, 'people', false),
            'description' => Str::limit($content, mt_rand(50, 150)),
            'content' => $content,
            'is_published' => true,
            'source_id' => mt_rand(1,10),
            'created_at' => now(),
            'updated_at' => now(),
        ];

    }
}

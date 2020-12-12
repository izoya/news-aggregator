<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    use WithFaker;

    /**
     * Assert news index page availability.
     */
    public function testNewsIndex()
    {
        $response = $this->get('/news');
        $response->assertStatus(200);
    }

    /**
     * Assert news show page availability.
     */
    public function testOneNewsPage()
    {
        $news = News::whereIsPublished(true)->first(['slug']);
        $response = $this->get('/news/' . $news->slug);

        $response->assertStatus(200);
    }
}

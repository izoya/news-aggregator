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
     * A basic feature test example.
     *
     * @return void
     */
    public function testNewsIndex()
    {
        $response = $this->get('/news');
        $response->assertStatus(200);
    }

    public function testOneNewsPage()
    {
        $slug = News::getNewsById(array_rand(News::getNews()))['slug'];
        $response = $this->get('/news/' . $slug);

        $response->assertStatus(200);
    }

    public function testNewsByCategory()
    {
        $catId = array_rand(Category::getCategories());
        $response = $this->get('/news/cat/' . $catId);

        $response->assertStatus(200);
    }



    public function testNewsCategoryTitle()
    {
        $view = $this->view('news.index', [
            'category' => 'MyTitle',
            'news' => [],
            'categories' => [],
        ]);

        $view->assertSee('MyTitle');
    }
}

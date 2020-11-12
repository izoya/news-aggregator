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
        $news = new News();
        $slug = $news->getNewsById($news->getNews()->random()->id)->slug;
        $response = $this->get('/news/' . $slug);

        $response->assertStatus(200);
    }

    public function testNewsByCategory()
    {
        $category = new Category();
        $catId = $category->getCategories()->random()->id;
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

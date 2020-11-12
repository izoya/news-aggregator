<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function testCategoryIndex()
    {
        $response = $this->get('/cat');
        $response->assertStatus(200);
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSideCategoriesComponent()
    {
        $category = new Category();
        $category_name = $category
            ->getCategoryById($category->getCategories()->random()->id)->title;
        $view = $this->blade('<x-aside-categories/>');

        $view
          ->assertSee($category_name);
    }
}

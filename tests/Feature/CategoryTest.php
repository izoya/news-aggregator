<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * Assert category index page availability.
     */
    public function testCategoryIndex()
    {
        $response = $this->get('/cat');
        $response->assertStatus(200);
    }

    /**
     * Assert category show page availability.
     */
    public function testCategoryShow()
    {
        $category = Category::first();
        $response = $this->get('/cat/' . $category->slug);

        $response->assertStatus(200)
        ->assertSee($category->title);
    }
}

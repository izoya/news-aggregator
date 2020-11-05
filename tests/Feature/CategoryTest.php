<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSideCategoriesComponent()
    {
        $view = $this->blade('<x-aside-categories :categories="$categories"/>',
        [
          'categories' => [
            'First category',
            'Second category'
          ],
        ]);

        $view
          ->assertSee('First category')
          ->assertSee('Second category');
    }
}

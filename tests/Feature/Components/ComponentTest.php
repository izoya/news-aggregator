<?php

namespace Tests\Feature\Components;

use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Str;
use Tests\TestCase;

class ComponentTest extends TestCase
{
    /**
     * Assert that the AsideCategories Component displays a list of categories from DB
     */
    public function testAsideCategoriesComponent()
    {
        $categories = Category::orderBy('slug')->get();
        $category_names = $categories->map(function ($item) {
            return $item->title;
        })->toArray();

        $view = $this->blade('<x-aside-categories/>');
        $view->assertSeeInOrder($category_names);
    }

    /**
     * Assert that the AsideSource Component displays the given source
     */
    public function testAsideSourceComponent()
    {
        $source = Source::first();

        $view = $this->blade(
            '<x-aside-source :source="$source" />',
            ['source' => $source]
        );

        $view->assertSee($source->name);
    }

    /**
     * Assert that the Footer Component displays the last news
     */
    public function testFooterComponentShowsLastNews()
    {
        $news = (new News())->getRecent(1)->first();
        $view = $this->blade('<x-footer />');

        $view->assertSee($news->link);

    }
}

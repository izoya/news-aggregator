<?php

namespace App\Http\Controllers;

use App\Models\Category;


class CategoryController extends Controller
{
    protected $newsPerPage = 10;

    public function index(Category $category)
    {
        return view('category.index', [
            'categories' => $category->withNewsCount()->orderBy('slug')->get(),
        ]);
    }

    public function show(Category $category)
    {
        if (!$category) {
            abort(404);
        }

        return view('news.index', [
            'title' => $category->title,
            'news' => $category->news()
                ->whereIsPublished(1)
                ->paginate($this->newsPerPage),
        ]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return view('category.index', ['categories' => $category->all()]);
    }

    public function show(int $catId)
    {
        $category = Category::find($catId);

        if (!$category) {
            return abort(404);
        }

        return view('news.index', [
            'title' => $category->title,
            'news' => $category->news()->paginate(5),
        ]);
    }

}

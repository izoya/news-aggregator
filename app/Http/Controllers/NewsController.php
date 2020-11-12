<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', [
            'news' => News::getNews(),
            'category' => 'All News',

        ]);
    }

    public function show(string $slug)
    {
        return view('news.show')->with('news', News::getNewsBySlug($slug));
    }

    public function showFromCategory(int $catId)
    {
        return view('news.index', [
            'category' => Category::getCategoryById($catId),
            'news' => News::getNewsByCategory($catId),
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index(News $news)
    {
        return view('news.index', [
            'news' => $news->getNews(),
            'category' => 'All News',

        ]);
    }

    public function show(string $slug, News $news)
    {
        return view('news.show')
            ->with('news', $news->getNewsBySlug($slug));
    }

    public function showFromCategory(int $catId, News $news, Category $category)
    {
        return view('news.index', [
            'category' => $category->getCategoryById($catId)->title,
            'news' => $news->getNewsByCategory($catId),
        ]);
    }
}

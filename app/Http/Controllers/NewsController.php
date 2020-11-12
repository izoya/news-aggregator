<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index(News $news)
    {
        $news = News::query()->orderBy('created_at', 'desc')->paginate(10);

        return view('news.index', [
            'news' => $news,
            'title' => 'All News',
        ]);
    }

    public function show(string $slug)
    {
        $news = News::query()->where('slug', '=', $slug)->first();

        if (!$news) {
            return abort(404);
        }

        return view('news.show')
            ->with('news', $news);
    }


}

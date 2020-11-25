<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $perPage = 10;

    public function index(News $news)
    {
        $news = $news->whereIsPublished(1)
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('news.index', [
            'news' => $news,
            'title' => 'All News',
        ]);
    }

    public function show(string $slug)
    {
        $news = News::query()
            ->where('slug', '=', $slug)
            ->where('is_published', '=', 1)
            ->first();

        //  NOTE: Empty $news is processed in the template

        return view('news.show')
            ->with('news', $news);
    }


}

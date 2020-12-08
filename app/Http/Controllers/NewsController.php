<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $perPage = 15;

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

    public function show(News $news)
    {
        return view('news.show')
            ->with('news', $news);
    }


}

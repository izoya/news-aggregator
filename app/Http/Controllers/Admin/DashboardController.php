<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\News;
use App\Models\Feed;
use App\Models\Source;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $news = News::query()->orderBy('updated_at', 'desc')->take(5)->get();
        $users = User::query()->orderBy('updated_at', 'desc')->take(5)->get();
        $feeds = Feed::query()->orderBy('updated_at', 'desc')->take(5)->get();
        $feedback = Feedback::query()->orderBy('created_at', 'desc')->take(5)->get();
        $categories = Category::query()->take(5)->get();
        $sources = Source::query()->take(5)->get();

        return view('admin.dashboard', [
            'news' => $news,
            'users' => $users,
            'feeds' => $feeds,
            'feedbackList' => $feedback,
            'categories' => $categories,
            'sources' => $sources,

        ]);
    }
}

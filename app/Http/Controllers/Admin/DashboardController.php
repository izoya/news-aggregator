<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $news = News::query()->orderBy('updated_at', 'desc')->take(5)->get();
        $users = User::query()->orderBy('updated_at', 'desc')->take(5)->get();
        $resources = Resource::query()->orderBy('updated_at', 'desc')->take(5)->get();
        return view('admin.dashboard', [
            'news' => $news,
            'users' => $users,
            'resources' => $resources,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('admin.dashboard', [
            'news' => News::query()->orderBy('updated_at', 'desc')->take(5)->get(),
        ]);
    }
}

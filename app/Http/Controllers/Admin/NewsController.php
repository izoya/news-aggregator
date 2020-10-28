<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return redirect()->route('news');
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function edit(int $id)
    {
        echo "Admin news edit #" . $id;
    }

    public function destroy(int $id)
    {
        echo "Admin news destroy #" . $id;
    }
}

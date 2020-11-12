<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use File;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Storage;
use Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response()->view('admin.news.index');
        // return response()->json(News::getNews());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Category $category
     * @return Response
     */
    public function create(Category $category)
    {
        return response()->view('admin.news.create', [
            'categories' => $category->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response | RedirectResponse
     * @throws FileNotFoundException
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        $data = $request->only(['title', 'description']);
        $news = new News();
        $news->slug = Str::slug($data['title']);
        $news->image = null;
        $result = $news->fill($data)->save();

        if(!$result) {
            return redirect()->back()
                ->with('error', __('alerts.error.addNews'));
        }

        return redirect()->route('news.show', ['slug' => $news->slug])
            ->with('success', __('alerts.success.addNews'));
    }

    /**
     * Display the specified resource.
     *
     * @param News $news
     * @return Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param News $news
     * @return Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return Response
     */
    public function destroy(News $news)
    {
        //
    }
}

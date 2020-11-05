<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
      // return response()->json($this->newsList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return response()->view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response | RedirectResponse
     */
    public function store(Request $request)
    {
      $request->validate([
        'title' => 'required',
      ]);

      $data = $request->except(['_token']);

      return redirect()->route('admin.news');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
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
     * @param  \App\Models\News  $news
     * @return Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return Response
     */
    public function destroy(News $news)
    {
        //
    }
}

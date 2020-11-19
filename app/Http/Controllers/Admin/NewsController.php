<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsStore;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Str;

class NewsController extends Controller
{
    protected $perPage = 10;
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $news = News::query()->orderBy('updated_at', 'desc')->paginate($this->perPage);

        return response()->view('admin.news.index', [
            'news' => $news,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Category $category
     * @return Response
     */
    public function create()
    {
        return response()->view('admin.news.form', [
            'news' => null,
            'categories' => Category::all(),
            'sources' => Source::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response | RedirectResponse
     * @throws FileNotFoundException
     */
    public function store(NewsStore $request, News $news)
    {
        dump($news);
        $data = $request->validated();
        $news->slug = Str::slug($data['title']);
        $news->image = null;

        try {
            $news->fill($data)->save();

        } catch (QueryException $e) {

            $request->flash();

            return redirect()->back()
                ->with('error', __('sessions.error.dbError', ['code' => $e->errorInfo[1]]));
        }

        return redirect()->route('news.show', ['slug' => $news->slug])
            ->with('success', __('sessions.success.addNews'));
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
        return response()->view('admin.news.form', [
            'news' => $news,
            'categories' => Category::all(),
            'sources' => Source::all(),
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(NewsStore $request, News $news)
    {
        $data = $request->validated();
        $news->slug = Str::slug($data['title']);
        $news->image = null;

        try {
            $news->fill($data)->save();

        } catch (QueryException $e) {

            $request->flash();

            return redirect()->back()
                ->with('error', __('sessions.error.dbError', ['code' => $e->errorInfo[2]]));
        }

        return redirect()->route('admin.news.index')
            ->with('success', __('sessions.success.updateNews'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return RedirectResponse
     */
    public function destroy(News $news)
    {
        try {
            $news->delete();

        } catch (QueryException $e) {

            return redirect()->back()
                ->with('error', __('sessions.error.dbError', ['code' => $e->errorInfo[1]]));
        }

        return redirect()->back()
            ->with('success', __('sessions.success.deleteNews'));
    }
}

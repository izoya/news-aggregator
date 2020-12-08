<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsStore;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use App\Services\NewsService;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Log;
use Storage;

class NewsController extends Controller
{
    protected $perPage = 15;
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $news = News::orderBy('updated_at', 'desc')
                    ->paginate($this->perPage);

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
            'catIds' => null,
            'categories' => Category::all(),
            'sources' => Source::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsStore $request
     * @param News $news
     * @return Response | RedirectResponse
     */
    public function store(NewsStore $request, News $news)
    {
        $error = (new NewsService())->saveNews($request, $news);

        if ($error) {
            $request->flash();

            return redirect()->back()->with('error', $error);
        }

        return redirect()->route('news.show', ['news' => $news])
            ->with('success', __('sessions.success.addNews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return Response
     */
    public function edit(News $news): Response
    {
        return response()->view('admin.news.form', [
            'news' => $news,
            'catIds' => $news->categories,
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
    public function update(NewsStore $request, News $news): RedirectResponse
    {
        $oldImage = $news->image;
        $error = (new NewsService())->saveNews($request, $news);

        if ($error) {
            $request->flash();

            return redirect()->back()->with('error', $error);
        }

        if ($request->hasFile('image')) {
            Storage::disk('uploads')->delete($oldImage);
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
        $oldImage = $news->image;
        try {
            $news->delete();
            /* news_categories detach performed via DB foreign-key constraint */
        }
        catch (QueryException $e) {
            Log::error($e->getMessage());

            return redirect()->back()
                ->with('error', __('sessions.error.error'));
        }

        if (Storage::disk('uploads')->exists($oldImage)) {
            Storage::disk('uploads')->delete($oldImage);
        }

        return redirect()->back()
            ->with('success', __('sessions.success.deleteNews'));
    }
}

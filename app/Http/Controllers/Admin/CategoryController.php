<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStore;
use App\Models\Category;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Log;
use Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Category $category
     * @return View|Response
     */
    public function index(Category $category)
    {
        return view('admin.category.index', [
            'categories' => $category->withNewsCount()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View|Response
     */
    public function create()
    {
        return view('admin.category.form', [
            'category' => null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryStore $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function store(CategoryStore $request, Category $category): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);

        if (Category::whereSlug($data['slug'])->where('id', '<>', $category->id)->exists()) {
            return back()->with('error', __('sessions.error.slugUnique'));
        }

        try {
            $category->fill($data)->save();
        }
        catch (QueryException $e) {
            Log::error($e->getMessage());
            $request->flash();

            return back()->with('error', __('sessions.error.error'));
        }

        return redirect()->route('admin.category.index')
            ->with('success', __('sessions.success.addCategory'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return View
     */
    public function edit(Category $category): View
    {
        return view('admin.category.form', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryStore $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(CategoryStore $request, Category $category): RedirectResponse
    {
        return $this->store($request, $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Category $category): RedirectResponse
    {
        if ($category->news()->count()) {

            return redirect()->back()
                ->with('error', __('sessions.error.notEmpty'));
        }

        try {
            $category->delete();
        }
        catch (QueryException $e) {
            Log::error($e->getMessage());

            return redirect()->back()
                ->with('error', __('sessions.error.error'));
        }

        return redirect()->back()
            ->with('success', __('sessions.success.deleteCategory'));
    }

    /**
     * Remove all news from the given category.
     * @param Category $category
     * @return RedirectResponse
     */
    public function clean(Category $category): RedirectResponse
    {
        try {
            $category->news()->detach();
        }
        catch (QueryException $e) {
            Log::error($e->getMessage());

            return redirect()->back()
                ->with('error', __('sessions.error.error'));
        }

        return redirect()->back()
            ->with('success', __('sessions.success.emptyCategory', [
                'category' => $category->title]));
    }
}

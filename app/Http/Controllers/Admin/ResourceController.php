<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResourceStore;
use App\Models\Category;
use App\Models\Resource;
use Illuminate\Database\QueryException;
use Log;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Resource $resource
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Resource $resource)
    {
        return view('admin.resource.index', [
            'resources' => $resource->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('admin.resource.form', [
            'resource' => null,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ResourceStore $request
     * @param Resource $resource
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ResourceStore $request, Resource $resource)
    {
        try {
            $resource->fill($request->validated())->save();
        }
        catch (QueryException $e) {
            Log::error($e->getMessage());
            $request->flash();

            return back()->with('error', __('sessions.error.error'));
        }

        return redirect()->route('admin.resource.index')
            ->with('success', __('sessions.success.addFeed'));
    }

    /**
     * Display the specified resource.
     *
     * @param Resource $resource
     * @return void
     */
    public function show(Resource $resource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Resource $resource)
    {
        return response()->view('admin.resource.form', [
            'resource' => $resource,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ResourceStore $request
     * @param Resource $resource
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ResourceStore $request, Resource $resource)
    {
        try {
            $resource->fill($request->validated())->save();

        } catch (QueryException $e) {
            Log::error($e->getMessage());
            $request->flash();

            return back()->with('error', __('sessions.error.error'));
        }

        return redirect()->route('admin.resource.index')
            ->with('success', __('sessions.success.changeFeed'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Resource $resource
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Resource $resource)
    {
        try {
            $resource->delete();

        } catch (QueryException $e) {
            Log::error($e->getMessage());

            return redirect()->back()
                ->with('error', __('sessions.error.error'));
        }

        return redirect()->back()
            ->with('success', __('sessions.success.deleteFeed'));
    }
}

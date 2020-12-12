<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SourceStore;
use App\Models\Source;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Log;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Source $source
     * @return View
     */
    public function index(Source $source): View
    {
        return view('admin.source.index', [
            'sources' => $source->withNewsCount()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.source.form', [
            'source' => null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SourceStore $request
     * @param Source $source
     * @return RedirectResponse
     */
    public function store(SourceStore $request, Source $source): RedirectResponse
    {
        $data = $request->validated();

        if (Source::whereName($data['name'])->where('id', '<>', $source->id)->exists()) {
            return back()->with('error', __('sessions.error.nameUnique'));
        }

        try {
            $source->fill($data)->save();
        }
        catch (QueryException $e) {
            Log::error($e->getMessage());
            $request->flash();

            return back()->with('error', __('sessions.error.error'));
        }

        return redirect()->route('admin.source.index')
            ->with('success', __('sessions.success.addSource'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Source $source
     * @return View
     */
    public function edit(Source $source): View
    {
        return view('admin.source.form', [
            'source' => $source,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Source $source
     * @return RedirectResponse
     */
    public function update(SourceStore $request, Source $source): RedirectResponse
    {
        return $this->store($request, $source);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Source $source
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Source $source): RedirectResponse
    {
        if ($source->news()->count()) {

            return redirect()->back()
                ->with('error', __('sessions.error.notEmpty'));
        }

        try {
            $source->delete();
        }
        catch (QueryException $e) {
            Log::error($e->getMessage());

            return redirect()->back()
                ->with('error', __('sessions.error.error'));
        }

        return redirect()->back()
            ->with('success', __('sessions.success.deleteSource'));
    }

    /**
     * Remove all news from the given source.
     * @param Source $source
     * @return RedirectResponse
     */
    public function clean(Source $source): RedirectResponse
    {
        try {
            $source->news()->delete();
        } catch (QueryException $e) {
            Log::error($e->getMessage());

            return redirect()->back()
                ->with('error', __('sessions.error.error'));
        }

        return redirect()->back()
            ->with('success', __('sessions.success.emptySource', [
                'source' => $source->name]));
    }
}

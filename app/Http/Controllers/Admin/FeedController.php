<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedStore;
use App\Models\Category;
use App\Models\Feed;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Log;

class FeedController extends Controller
{
    /**
     * Display a listing of the feed.
     *
     * @param Feed $feed
     * @return View
     */
    public function index(Feed $feed)
    {
        return view('admin.feed.index', [
            'feeds' => $feed->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new feed.
     *
     * @return View|Response
     */
    public function create()
    {
        return view('admin.feed.form', [
            'feed' => null,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created feed in storage.
     *
     * @param FeedStore $request
     * @param Feed $feed
     * @return RedirectResponse
     */
    public function store(FeedStore $request, Feed $feed): RedirectResponse
    {
        try {
            $feed->fill($request->validated())->save();
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            $request->flash();

            return back()->with('error', __('sessions.error.error'));
        }

        return redirect()->route('admin.feed.index')
            ->with('success', __('sessions.success.addFeed'));
    }

    /**
     * Display the specified feed.
     *
     * @param Feed $feed
     * @return void
     */
    public function show(Feed $feed)
    {
        //
    }

    /**
     * Show the form for editing the specified feed.
     *
     * @param Feed $feed
     * @return View
     */
    public function edit(Feed $feed): View
    {
        return view('admin.feed.form', [
            'feed' => $feed,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified feed in storage.
     *
     * @param FeedStore $request
     * @param Feed $feed
     * @return RedirectResponse
     */
    public function update(FeedStore $request, Feed $feed)
    {
        try {
            $feed->fill($request->validated())->save();

        } catch (QueryException $e) {
            Log::error($e->getMessage());
            $request->flash();

            return back()->with('error', __('sessions.error.error'));
        }

        return redirect()->route('admin.feed.index')
            ->with('success', __('sessions.success.updateFeed'));
    }

    /**
     * Remove the specified feed from storage.
     *
     * @param Feed $feed
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Feed $feed)
    {
        try {
            $feed->delete();

        } catch (QueryException $e) {
            Log::error($e->getMessage());

            return redirect()->back()
                ->with('error', __('sessions.error.error'));
        }

        return redirect()->back()
            ->with('success', __('sessions.success.deleteFeed'));
    }
}

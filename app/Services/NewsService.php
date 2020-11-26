<?php


namespace App\Services;

use App\Http\Requests\NewsStore;
use Illuminate\Database\QueryException;
use App\Models\News;
use Log;
use Str;

class NewsService
{
    public function saveNews(NewsStore $request, News $news)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);

        if (News::where('slug', $data['slug'])->where('id', '<>', $news->id)->exists()) {
            return __('sessions.error.slugUnique');
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = uniqid('img_') . '.' . $file->getClientOriginalExtension();
            $data['image'] = $file->storeAs('news', $filename, 'uploads');
        }

        try {
            $news->fill($data)->save();
            $news->categories()->sync([$request->category_id]);
            // TODO attach several categories

        } catch (QueryException $e) {
            Log::error($e->getMessage());

            return __('sessions.error.error');
        }

        return false;
    }
}

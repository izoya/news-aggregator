<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{


  public function index()
  {
    return view('news.index', [
      'news' => $this->newsList,
      'category' => 'All News',
      'categories' => $this->categories,
    ]);
  }

  public function show(string $slug)
  {
    $news_id = array_search($slug, array_column($this->newsList, 'slug'));

    if ($news_id === false) {
      return back();
    }

    return view('news.show', [
      'news' => $this->newsList[$news_id],
      'categories' => $this->categories,
    ]);
  }

  public function showFromCategory(int $id)
  {
    $newsFromCategory = [];

    foreach ($this->newsList as $news) {
      if (is_array($news)) {
        if (isset($news['category_id']) && intval($news['category_id']) === $id) {
          $newsFromCategory[] = $news;
        }
      }
    }

    return view('news.index', [
      'category' => $this->getCategories()[$id],
      'news' => $newsFromCategory,
      'categories' => $this->categories,
    ]);
  }
}

<?php

namespace App\View\Components;

use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Article extends Component
{

    public $news;

    /**
     * Create a new component instance.
     *
     * @param $news
     * @param $id
     */
    public function __construct($news = null)
    {
        $this->news = $news;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.article');
    }
}

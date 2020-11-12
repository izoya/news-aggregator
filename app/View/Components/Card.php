<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $news;
    public $id;

    /**
     * Create a new component instance.
     *
     * @param $news
     * @param $id
     */
    public function __construct($news, $id)
    {
        $this->news = $news;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.card');
    }
}

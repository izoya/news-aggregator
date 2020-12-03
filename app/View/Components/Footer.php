<?php

namespace App\View\Components;

use App\Models\News;
use Illuminate\View\Component;

class Footer extends Component
{
    public $newsList;
    protected $recentNewsCount = 3;

    /**
     * Create a new component instance.
     *
     * @param News $news
     */
    public function __construct(News $news)
    {
        $this->newsList = $news->getRecent($this->recentNewsCount);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.footer');
    }
}

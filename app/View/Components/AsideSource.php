<?php

namespace App\View\Components;

use App\Models\Source;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AsideSource extends Component
{
    public $source;

    /**
     * Create a new component instance.
     * @param Source $source
     */
    public function __construct(Source $source)
    {
        $this->source = $source;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.aside-source');
    }
}

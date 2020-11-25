<?php

namespace App\View\Components;

use App\Models\Source;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AsideSource extends Component
{
    protected $source;

    /**
     * Create a new component instance.
     *
     * @param int $id
     */
    public function __construct(int $id)
    {
        $source = Source::find($id) ?? [];
        $this->source = $source;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.aside-source', ['source' => $this->source]);
    }
}

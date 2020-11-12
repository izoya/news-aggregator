<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AsideCategories extends Component
{
  public $categories = [];

    /**
     * Create a new component instance.
     *
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->categories = $category->all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.aside-categories');
    }
}

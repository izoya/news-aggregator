<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function index() {
    return view('category.index', ['categories' => $this->getCategories()]);
  }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $categories = [
        1 => 'Tech',
        2 => 'Business',
        3 => 'Education',
        4 => 'Sport',
        5 => 'Entertainment',
        6 => 'Lifestyle'
    ];
    protected $newsList;

    protected function getCategories()
    {
        return $this->categories;
    }

    protected function getNews()
    {
        return $this->newsList;
    }
}

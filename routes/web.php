<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin'], function () {
  Route::get('/news', [\App\Http\Controllers\Admin\NewsController::class, 'index'])
    ->name('admin.news');
  Route::get('/news/create', [\App\Http\Controllers\Admin\NewsController::class, 'create'])
    ->name('admin.news.create');
  Route::get('/news/edit/{id}', [\App\Http\Controllers\Admin\NewsController::class, 'edit'])
    ->where('id', '\d+')
    ->name('admin.news.edit');
  Route::get('/news/destroy/{id}', [\App\Http\Controllers\Admin\NewsController::class, 'destroy'])
    ->where('id', '\d+')
    ->name('admin.news.destroy');
});


Route::get('/cat', [\App\Http\Controllers\CategoryController::class, 'index'])
  ->name('category');


Route::get('/news', [\App\Http\Controllers\NewsController::class, 'index'])
  ->name('news');
Route::get('/news/cat/{id}', [\App\Http\Controllers\NewsController::class, 'showFromCategory'])
  ->where('id', '\d+')->name('news.cat');
Route::get('/news/{slug}', [\App\Http\Controllers\NewsController::class, 'show'])
  ->where('slug', '\w+')->name('news.show');


Route::get('/auth', [\App\Http\Controllers\AuthController::class, 'index'])
  ->name('auth');


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


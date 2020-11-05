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
  Route::resource('news', \App\Http\Controllers\Admin\NewsController::class)
    ->names([
      'index' =>'admin.news',
      'create' => 'admin.news.create',
  ]);
});


Route::get('/cat', [\App\Http\Controllers\CategoryController::class, 'index'])
  ->name('category');


Route::get('/news', [\App\Http\Controllers\NewsController::class, 'index'])
  ->name('news');
Route::get('/news/cat/{id}', [\App\Http\Controllers\NewsController::class, 'showFromCategory'])
  ->where('id', '\d+')->name('news.cat');
Route::get('/news/{slug}', [\App\Http\Controllers\NewsController::class, 'show'])
  ->where('slug', '\w+')->name('news.show');


Route::get('/feedback', function (){
  return view('about.feedback');
})->name('about.feedback');

Route::resource('about', \App\Http\Controllers\AboutController::class);
Route::resource('order', \App\Http\Controllers\OrderController::class)
  ->name('create', 'order');


Route::get('/auth', [\App\Http\Controllers\AuthController::class, 'index'])
  ->name('auth');


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


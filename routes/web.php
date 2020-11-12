<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'index'])->name('home');


Route::prefix('admin')->group(function () {
    Route::resource('news', \App\Http\Controllers\Admin\NewsController::class)
        ->names([
            'index' => 'admin.news',
            'create' => 'admin.news.create',
            'store' => 'admin.news.store',
        ]);
    });


Route::get('/cat', [CategoryController::class, 'index'])
    ->name('category');


Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('news');
    Route::get('/cat/{id}', [NewsController::class, 'showFromCategory'])
        ->where('id', '\d+')->name('news.category');
    Route::get('/{slug}', [NewsController::class, 'show'])
        // ->where('slug', '\w+')
        ->name('news.show');
    });


Route::resource('feedback', FeedbackController::class)
    ->name('index', 'feedback');


Route::resource('order', OrderController::class)
    ->name('create', 'order');


Route::get('/auth', [AuthController::class, 'index'])
    ->name('auth');


Auth::routes();

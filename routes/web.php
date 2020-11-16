<?php

use App\Http\Controllers\Admin\DashboardController;
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

Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('news', \App\Http\Controllers\Admin\NewsController::class);
    Route::resource('order', \App\Http\Controllers\Admin\OrderController::class);
});

Route::get('/cat', [CategoryController::class, 'index'])->name('category');

Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('news');
    Route::get('/cat/{id}', [CategoryController::class, 'show'])
        ->where('id', '\d+')->name('news.category');
    Route::get('/{slug}', [NewsController::class, 'show'])
        // ->where('slug', '\w+')
        ->name('news.show');
    });

Route::resource('feedback', FeedbackController::class)->name('index', 'feedback');

Route::resource('order', OrderController::class)->name('index', 'order');


Route::get('/auth', [AuthController::class, 'index'])->name('auth');
Auth::routes();

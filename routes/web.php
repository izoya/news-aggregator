<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\FeedController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Socialite\SocialiteController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

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

Route::middleware('guest')->prefix('login')->group(function () {
    Route::get('/{provider}', [SocialiteController::class, 'redirectToProvider'])->name('login.oauth');
    Route::get('/{provider}/callback', [SocialiteController::class, 'handleProviderCallback']);
});

Route::middleware('auth')->group(function () {
    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::prefix('admin')
        ->middleware('admin')
        ->name('admin.')
        ->group(function () {
            Route::get('/', DashboardController::class)->name('dashboard');
            Route::get('/parser', [ParserController::class, 'index'])->name('parser');
            Route::get('/feedback', [AdminFeedbackController::class, 'index'])->name('feedback.index');
            Route::put('/feedback/status/{feedback}', [AdminFeedbackController::class, 'update'])
                ->name('feedback.status');
            Route::resource('category', AdminCategoryController::class);
            Route::delete('/category/clean/{category}', [AdminCategoryController::class, 'clean'])
                ->name('category.clean');
            Route::resource('news', AdminNewsController::class);
            Route::put('/changeStatus/{user}', [AdminUserController::class, 'changeStatus'])
                ->name('user.status');
            Route::resource('user', AdminUserController::class);
            Route::resource('order', AdminOrderController::class);
            Route::resource('feed', FeedController::class);
    });
});

Route::prefix('cat')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category');
    Route::get('/{category:slug}', [CategoryController::class, 'show'])->name('category.show');
});

Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('news');
    Route::get('/{news:slug}', [NewsController::class, 'show'])->name('news.show');
});

Route::prefix('feedback')->group(function () {
    Route::get('/', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::middleware(['throttle:userFormSubmit'])->post('/', [FeedbackController::class, 'store']);
});

Route::get('/auth', [AuthController::class, 'index'])->name('auth');
Auth::routes();


Route::prefix('laravel-filemanager')->middleware(['web', 'auth', 'admin'])->group(function () {
    Lfm::routes();
});

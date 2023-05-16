<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::middleware(['auth', 'verified'])->prefix('session/')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('session.dashboard');
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Article Route
    Route::get('articles/my_articles', [ArticleController::class, 'index'])->name('article.index');
    Route::get('articles/article_lists', [ArticleController::class, 'lists'])->name('article.lists');
    Route::get('articles/article_create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('articles/article_store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('articles/article_edit/{article:slug}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('articles/article_edit', [ArticleController::class, 'update'])->name('article.update');
    Route::get('articles/{article:slug}', [ArticleController::class, 'show'])->name('article.show');


    //Article Comment
    Route::post('articles/comment/{article:slug}', [CommentController::class, 'store'])->name('comment.store');

    //Categories Route
    Route::get('categories', [CategoryController::class, 'index'])->name('category.index');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('categories/edit/{category:uuid}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('categories/edit/{category:uuid}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('categories/destroy/{category:uuid}', [CategoryController::class, 'destroy'])->name('category.destroy');

    //Categories Route
    Route::get('tags', [TagController::class, 'index'])->name('tag.index');
    Route::post('tags/store', [TagController::class, 'store'])->name('tag.store');
    Route::put('tags/update/{tag:uuid}', [TagController::class, 'update'])->name('tag.update');
    Route::delete('tags/destroy/{tag:uuid}', [TagController::class, 'destroy'])->name('tag.destroy');
});

require __DIR__ . '/auth.php';

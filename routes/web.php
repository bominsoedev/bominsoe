<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/session/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Article Route
    Route::get('/session/articles/my_articles', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/session/articles/lists', [ArticleController::class, 'lists'])->name('article.lists');
    Route::get('/session/articles/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/session/articles/store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/session/articles/edit{article:slug}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/session/articles/edit', [ArticleController::class, 'update'])->name('article.update');
    Route::get('/session/articles/{article:slug}', [ArticleController::class, 'show'])->name('article.show');
    Route::post('/app/file_upload', [ArticleController::class, 'upload'])->name('article.upload');

    //Article Comment
    Route::post('/session/articles/comment/{article:slug}', [CommentController::class, 'store'])->name('comment.store');


    //Categories Route
    Route::get('/session/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/session/categories/store', [CategoryController::class, 'store'])->name('category.store');
    Route::put('/session/categories/update{category:uuid}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/session/categories/destroy{category:uuid}', [CategoryController::class, 'destroy'])->name('category.destroy');
});

require __DIR__.'/auth.php';

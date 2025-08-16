<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\Admin\AuthorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/a-propos', 'about')->name('about');
Route::get('/actualite', [PostController::class, 'index'])->name('posts.index');
Route::get('/videos', [PostController::class, 'videos'])->name('posts.videos');
Route::get('/articles', [PostController::class, 'index'])->name('posts.articles');

Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/pays', [CountryController::class, 'index'])->name('countries.index');
Route::get('/pays/{country}', [CountryController::class, 'show'])->name('countries.show');

// Admin routes (placées avant la route générique)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        $posts = \App\Models\Post::with(['author', 'category'])->latest()->paginate(10);
        return view('admin.index', compact('posts'));
    })->name('dashboard');

    // Articles CRUD
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class)->except(['show']);

    // Sponsors CRUD
    Route::resource('sponsors', \App\Http\Controllers\Admin\SponsorController::class)->except(['show', 'edit', 'update']);

    // Authors CRUD
    Route::resource('authors', AuthorController::class)->only(['index', 'store', 'destroy']);
});

// Page de recherche : doit être placée AVANT la route générique "/{post}"
Route::get('/search', [HomeController::class, 'search'])->name('search');

// Route générique à placer en dernier
Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/articles/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

// About page

Route::view('/propos-capture-media', 'apropos-capturemedia')->name('apropos.capturemedia');

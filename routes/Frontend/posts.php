<?php

use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\SearchedPostController;
use Illuminate\Support\Facades\Route;

Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/{slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('posts/search-results/{input}', [SearchedPostController::class, 'index'])->name('search-posts.index');
Route::get('posts/search-by-category-results/{input}', [SearchedPostController::class, 'searchByCategory'])->name('search-by-category-posts.index');
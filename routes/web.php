<?php

use App\Http\Controllers\Frontend\PostController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [PostController::class, 'index']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('posts', [PostController::class, 'index'])->name('posts.index');

require __DIR__ . '/auth.php';
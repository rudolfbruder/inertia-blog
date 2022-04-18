<?php

use App\Http\Controllers\Frontend\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index']);

require __DIR__ . '/auth.php';
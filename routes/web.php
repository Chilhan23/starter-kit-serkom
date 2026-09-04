<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'landingPage'])
    ->name('landing');

Route::resource('products', ProductController::class)
    ->except(['show']);

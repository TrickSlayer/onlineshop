<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\ProductController;

Route::get('categories/{category}', [CategoryController::class, 'view'] );
Route::get('products/{product}', [ProductController::class, 'view']);
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\ProductController;

Route::prefix('categories')->group(function(){
    Route::get('{category}', [CategoryController::class, 'view'] );
    Route::post('load-product/{category}', [CategoryController::class, 'load']);
});

Route::get('products/{product}', [ProductController::class, 'view']);
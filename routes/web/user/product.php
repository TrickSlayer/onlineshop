<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shop\ProductController;

Route::prefix('products')->group(function () {
    
    Route::prefix('create')->group(function () {
        Route::get('/', [ProductController::class, 'createView']);
        Route::post('/', [ProductController::class, 'create']);
    });

    Route::prefix('list')->group(function () {
        Route::get('/', [ProductController::class, 'list']);
        Route::post('search', [ProductController::class, 'search']);
        Route::delete('destroy', [ProductController::class, 'destroy']);
    });

    Route::prefix('edit/{product}')->group(function () {
        Route::get('/', [ProductController::class, 'editView']);
        Route::post('/', [ProductController::class, 'edit']);
    });
    
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;


Route::prefix('categories')->group(function () {

    Route::prefix('create')->group(function () {
        Route::get('/', [CategoryController::class, 'createView']);
        Route::post('/', [CategoryController::class, 'create']);
    });

    Route::prefix('list')->group(function () {
        Route::get('/', [CategoryController::class, 'list']);
        Route::post('search', [CategoryController::class, 'search']);
        Route::delete('destroy', [CategoryController::class, 'destroy']);
    });

    Route::prefix('edit/{category}')->group(function () {
        Route::get('/', [CategoryController::class, 'editView']);
        Route::post('/', [CategoryController::class, 'edit']);
    });

});
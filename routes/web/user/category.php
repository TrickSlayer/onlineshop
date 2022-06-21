<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CategoryController;

Route::prefix('categories')->group(function () {

    Route::prefix('list')->group(function () {
        Route::get('/', [CategoryController::class, 'list']);
        Route::post('search', [CategoryController::class, 'search']);
    });

    Route::get('view/{category}', [CategoryController::class, 'view'] );
    Route::post('load-product/{category}', [CategoryController::class, 'load']);
    
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shop\ShopController;

Route::prefix('shop')->group(function () {
    
    Route::prefix('register')->group(function () {
        Route::get('/', [ShopController::class, 'registerView']);
        Route::post('/', [ShopController::class, 'register']);
    });

    // Route::prefix('list')->group(function () {
    //     Route::get('/', [ShopController::class, 'list']);
    //     Route::post('search', [ShopController::class, 'search']);
    //     Route::delete('destroy', [ShopController::class, 'destroy']);
    // });

    Route::prefix('edit/{Shop}')->group(function () {
        Route::get('/', [ShopController::class, 'editView']);
        Route::post('/', [ShopController::class, 'edit']);
    });
    
});
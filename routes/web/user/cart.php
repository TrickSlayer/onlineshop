<?php

use App\Http\Controllers\User\CartController;
use Illuminate\Support\Facades\Route;

Route::prefix('cart')->group(function () {

    Route::get('/', [CartController::class, 'myCart']);

    Route::post('add', [CartController::class, 'add']);

    Route::post('remove', [CartController::class, 'remove']);

    Route::post('change', [CartController::class, 'change']);

    Route::post('order', [CartController::class, 'order']);

    Route::get('list', [CartController::class, 'list']);
});
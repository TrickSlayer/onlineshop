<?php

use App\Http\Controllers\User\CartController;
use Illuminate\Support\Facades\Route;

Route::prefix('cart')->group(function () {

    Route::get('/', [CartController::class, 'myCart']);

    Route::post('add', [CartController::class, 'add']);
});
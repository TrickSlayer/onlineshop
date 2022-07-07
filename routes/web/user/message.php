<?php

use App\Http\Controllers\User\MessageController;
use Illuminate\Support\Facades\Route;

Route::prefix("message")->group(function () {

    Route::prefix("view")->group(function () {
        Route::get('{groupChat}', [MessageController::class, 'view']);
        Route::post('{groupChat}', [MessageController::class, 'sendMessage']);
    });

    Route::prefix('load')->group(function(){
        Route::post('{groupChat}', [MessageController::class, 'load']);
    });

    Route::prefix("seen")->group(function () {
        Route::post('{groupChat}', [MessageController::class, 'checkIfSeen']);
        Route::post('', [MessageController::class, 'unseen']);
    });

    Route::prefix("unseen")->group(function () {
        Route::post('count', [MessageController::class, 'countUnseen']);
    });

    Route::get('list', [MessageController::class, 'list']);
});

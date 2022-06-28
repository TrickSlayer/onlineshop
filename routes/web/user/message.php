<?php

use App\Http\Controllers\User\MessageController;
use Illuminate\Support\Facades\Route;

Route::prefix("message")->group(function(){
    Route::get('{groupChat}', [MessageController::class, 'view']);
    Route::post('{groupChat}', [MessageController::class, 'sendMessage']);
});

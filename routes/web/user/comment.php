<?php

use App\Http\Controllers\User\CommentController;
use Illuminate\Support\Facades\Route;

Route::prefix('comment')->group(function () {

    Route::post('post/{product}', [CommentController::class, 'post']);

    Route::delete('delete/{product}', [CommentController::class, 'delete']);
    
});
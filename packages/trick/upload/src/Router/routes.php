<?php

use Trick\Upload\Controller\UploadController;
use Illuminate\Support\Facades\Route;

Route::prefix('upload')->group(function () {
    Route::post('store', [UploadController::class, 'upload']);
    Route::delete('delete', [UploadController::class, 'delete']);
});

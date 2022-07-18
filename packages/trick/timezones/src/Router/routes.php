<?php

use Illuminate\Support\Facades\Route;
use Laraveldaily\Timezones\Controller\TimezonesController;

Route::get('timezones/{timezone}', [TimezonesController::class, 'timezone']);

Route::get('map', function () {
    return view('timezones::mapLeafLet');
});

Route::prefix('api')->group(function(){
    Route::get('timezones/{timezone}', [TimezonesController::class, 'timezoneApi']);
});

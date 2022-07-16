<?php

use App\Http\Controllers\User\MapController;
use Illuminate\Support\Facades\Route;

Route::prefix("map")->group(function () {
    Route::post('search', [MapController::class, 'searchByName']);
    Route::post('ip', [MapController::class, 'searchByCoordinate']);
});

<?php

use App\Http\Controllers\User\AccountController;
use Illuminate\Support\Facades\Route;

Route::prefix('login')->group(function () {
    Route::get('/', [AccountController::class, 'loginView'])->name('login');
    Route::post('/', [AccountController::class, 'login']);
});

Route::prefix('register')->group(function () {
    Route::get('/', [AccountController::class, 'registerView']);
    Route::post('/', [AccountController::class, 'register']);
    Route::get('verify/{code}', [AccountController::class, 'verify']);
});

Route::prefix('password')->group(function () {
    Route::prefix('forgot')->group(function () {
        Route::get('/', [AccountController::class, 'forgotpasswordView']);
        Route::post('/', [AccountController::class, 'sendResetLink']);
    });

    Route::prefix('reset')->group(function () {
        Route::get('/{token}', [AccountController::class, 'resetpasswordView'])->name('user.password.reset');
        Route::post('/', [AccountController::class, 'resetPassword']);
    });

    Route::prefix('change')->middleware(['auth'])->group(function () {
        Route::get('/', [AccountController::class, 'changepasswordView']);
        Route::post('/', [AccountController::class, 'changepassword']);
    });
});

Route::get('logout', [AccountController::class, 'logout'])->middleware(['auth']);
<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('home', function () {return View('common.home');})->name('home');

Route::prefix('login')->group(function(){
    Route::get('/', function () {return View('common.login');})->name('login');
    Route::post('/', [AccountController::class, 'login']);
});

Route::prefix('register')-> group(function(){
    Route::get('/', function () {return View('common.register');});
    Route::post('/', [AccountController::class, 'register']);
    Route::get('verify/{code}', [AccountController::class, 'verify']);
});

Route::prefix('password')->group(function(){
    Route::prefix('forgot')->group(function(){
        Route::get('/', function () {return View('common.forgotpassword');});
        Route::post('/', [AccountController::class, 'sendResetLink']);
    });

    Route::prefix('reset')->group(function(){
        Route::get('/{token}', [AccountController::class, 'showResetForm'])->name('user.password.reset');
        Route::post('/', [AccountController::class, 'resetPassword']);
    });

    Route::prefix('change')->middleware(['auth'])->group(function(){
        Route::get('/', function () {return View('user.changepassword');});
        Route::post('/', [AccountController::class, 'changepassword']);
    });
});

Route::middleware(['auth']) -> group(function(){
    Route::get('dashboard', function () {return View('user.dashboard');});
    Route::get('logout', [AccountController::class, 'logout']);
});

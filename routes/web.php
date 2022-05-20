<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UploadController;
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

Route::get('home', [ViewController::class, 'home'])->name('home');

Route::prefix('login')->group(function () {
    Route::get('/', [ViewController::class, 'login'])->name('login');
    Route::post('/', [AccountController::class, 'login']);
});

Route::prefix('register')->group(function () {
    Route::get('/', [ViewController::class, 'register']);
    Route::post('/', [AccountController::class, 'register']);
    Route::get('verify/{code}', [AccountController::class, 'verify']);
});

Route::prefix('password')->group(function () {
    Route::prefix('forgot')->group(function () {
        Route::get('/', [ViewController::class, 'forgotpassword']);
        Route::post('/', [AccountController::class, 'sendResetLink']);
    });

    Route::prefix('reset')->group(function () {
        Route::get('/{token}', [ViewController::class, 'resetpassword'])->name('user.password.reset');
        Route::post('/', [AccountController::class, 'resetPassword']);
    });

    Route::prefix('change')->middleware(['auth'])->group(function () {
        Route::get('/', [ViewController::class, 'changepassword']);
        Route::post('/', [AccountController::class, 'changepassword']);
    });
});

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [ViewController::class, 'dashboard']);
    Route::get('logout', [AccountController::class, 'logout']);

    //Upload file
    Route::prefix('upload')->group(function () {
        Route::post('store', [UploadController::class, 'upload']);
        Route::delete('delete', [UploadController::class, 'delete']);
    });


    Route::prefix('categories')->group(function () {

        Route::prefix('create')->group(function () {
            Route::get('/', [ViewController::class, 'categoriesCreate']);
            Route::post('/', [CategoryController::class, 'create']);
        });
        
        
    });

    
    
});

//Test funtion
Route::get('test', [HomeController::class, 'home']);

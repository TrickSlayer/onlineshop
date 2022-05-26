<?php

use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\Common\ViewController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Common\UploadController;
use App\Http\Controllers\MessageController;
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

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [ViewController::class, 'dashboard']);
    Route::get('logout', [AccountController::class, 'logout']);

    //Upload file
    Route::prefix('upload')->group(function () {
        Route::post('store', [UploadController::class, 'upload']);
        Route::delete('delete', [UploadController::class, 'delete']);
    });

    Route::prefix('admin')->group(function () {

        Route::prefix('categories')->group(function () {

            Route::prefix('create')->group(function () {
                Route::get('/', [CategoryController::class, 'createView']);
                Route::post('/', [CategoryController::class, 'create']);
            });

            Route::prefix('list')->group(function () {
                Route::get('/', [CategoryController::class, 'list']);
                Route::post('search', [CategoryController::class, 'search']);
                Route::delete('destroy', [CategoryController::class, 'destroy']);
            });

            Route::prefix('edit/{category}')->group(function () {
                Route::get('/', [CategoryController::class, 'editView']);
                Route::post('/', [CategoryController::class, 'edit']);
            });
        });

    });
});

//Test funtion
Route::get('test', [MessageController::class, 'index']);
Route::post('test', [MessageController::class, 'post']);

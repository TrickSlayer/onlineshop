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

Route::get('login', function () {return View('common.login');})->name('login');
Route::post('loginStore', [AccountController::class, 'login']);

Route::get('register', function () {return View('common.register');});
Route::post('registerStore', [AccountController::class, 'register']);

Route::middleware(['auth']) -> group(function(){
    Route::get('dashboard', function () {return View('user.dashboard');});
    Route::get('logout', [AccountController::class, 'logout']);
    
});

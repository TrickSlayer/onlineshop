<?php

use App\Http\Controllers\Common\ViewController;
use Illuminate\Support\Facades\Route;

Route::get('home', [ViewController::class, 'home'])->name('home');

Route::get('dashboard', [ViewController::class, 'dashboard'])->middleware(['auth']);


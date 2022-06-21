<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProductController;

Route::get('products/view/{product}', [ProductController::class, 'view']);
<?php

use App\Http\Controllers\Shop\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('shop/view/{shop}', ShopController::class);
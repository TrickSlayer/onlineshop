<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    include(__DIR__.'\admin\category.php');    
});
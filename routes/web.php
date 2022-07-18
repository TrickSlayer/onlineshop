<?php

use App\Http\Controllers\Common\ViewController;
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

include __DIR__ . '\web\user\home.php';

include __DIR__ . '\web\auth.php';


Route::middleware(['auth'])->group(function () {

    include __DIR__ . '\web\user.php';

    include __DIR__ . '\web\shop.php';

    include __DIR__ . '\web\admin.php';
    
});

//Test funtion
Route::get('test', [ViewController::class, 'test']);

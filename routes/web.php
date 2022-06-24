<?php

use App\Http\Controllers\MapController;
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

include __DIR__ . '\web\user\home.php';

include __DIR__ . '\web\auth.php';

Route::post('map/search', [MapController::class, 'searchByName']);

Route::middleware(['auth'])->group(function () {

    //Upload file   
    include __DIR__ . '\web\uploadFile.php';

    include __DIR__ . '\web\user.php';

    include __DIR__ . '\web\shop.php';

    include __DIR__ . '\web\admin.php';

    //Test funtion
    Route::get('mess/{groupChat}', [MessageController::class, 'index']);
    Route::post('mess/{groupChat}', [MessageController::class, 'post']);
    
});

Route::get('test', function(){return view('component');});

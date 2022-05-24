<?php

namespace App\Http\Controllers\Common;

use App\Jobs\DeleteImg;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function test(){
        return Category::factory()->count(10)->create();
    }

    public function home(){
        DeleteImg::dispatch()->delay(now()->addMonth());
        return View('common.home');
    }

    public function dashboard(){
        return View('logged.user.dashboard');
    }
    
}

<?php

namespace App\Http\Controllers;

use App\Jobs\DeleteImg;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
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

    public function login(){
        return View('common.login');
    }

    public function register(){
        return View('common.register');
    }

    public function forgotpassword(){
        return View('common.forgotpassword');
    }

    public function resetpassword(Request $request, $token = null)
    {
        return view('common.resetpassword')->with(['token' => $token, 'email' => $request->email]);
    }

    public function changepassword(){
        return View('user.changepassword');
    }

    public function dashboard(){
        return View('user.dashboard');
    }

    public function categoriesCreate(){
        return View('admin.categories.create');
    }

    
    
}

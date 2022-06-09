<?php

namespace App\Http\Controllers\Common;

use App\Jobs\DeleteImg;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ViewController extends Controller
{

    public function home(){
        DeleteImg::dispatch()->delay(now()->addMonth());
        return View('common.home');
    }

    public function dashboard(){
        $products1 = View('logged.user.products.products_nonwrap', [
            "category" => Category::first(),
            "products" =>  Product::paginate(5)
        ])->render();

        $products2 = View('logged.user.products.products_wrap', [
            "category" => Category::first(),
            "products" =>  Product::paginate(20)
        ])->render();

        return View('logged.user.dashboard',[
            "products1" => $products1,
            "products2" => $products2
        ]);
    }
    
}

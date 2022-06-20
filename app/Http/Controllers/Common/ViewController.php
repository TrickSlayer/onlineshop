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
        
        // Category::factory()->count(10)->create();

        $categories = Category::paginate(7);

        $products1 = [
            "category" => Category::first(),
            "products" =>  Product::paginate(5)
        ];

        $products2 = [
            "category" => Category::first(),
            "products" =>  Product::paginate(20),
        ];

        return View('logged.user.dashboard',[
            "categories" => $categories,
            "products1" => $products1,
            "products2" => $products2
        ]);
    }
    
}

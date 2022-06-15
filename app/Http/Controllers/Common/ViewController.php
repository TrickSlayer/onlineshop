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

        $categories = View('logged.admin.categories.box_categories', [
            "categories" => Category::paginate(7),
        ])->render();

        $products1 = View('logged.shop.products.box_products', [
            "category" => Category::first(),
            "products" =>  Product::paginate(5)
        ])->render();

        $products2 = View('logged.shop.products.box_products', [
            "category" => Category::first(),
            "products" =>  Product::paginate(20),
            "wrap" => true
        ])->render();

        return View('logged.user.dashboard',[
            "categories" => $categories,
            "products1" => $products1,
            "products2" => $products2
        ]);
    }
    
}

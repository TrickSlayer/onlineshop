<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function view(Category $category)
    {
        $this->authorize('view',$category);
        return view('logged.user.categories.category', [
            "category" => $category,
            "products" => $this->getProducts($category),
        ]);
    }

    public function getProducts($category){
        $products = View('logged.shop.products.products_wrap', [
            "title" => $category->name,
            "products" => $category->products
        ])->render();
        return $products;
    }
}

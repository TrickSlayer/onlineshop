<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function view(Product $product)
    {
        $this->authorize('view',$product);
        
        return view('logged.user.products.product', [
            "product" => Product::where('id', $product->id)->with('shop')->first(),
        ]);
    }

}

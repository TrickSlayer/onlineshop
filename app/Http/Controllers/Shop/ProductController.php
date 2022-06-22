<?php

namespace App\Http\Controllers\Shop;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormProductRequest;
use App\Http\Services\ProductService;
use App\Models\Category;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function createView(){
        $this->authorize('create',Product::class);
        $categories = Category::all();
        return View('logged.shop.products.create',["categories" => $categories]);
    }

    public function editView(Product $product){
        $this->authorize('update',$product);

        return View('logged.shop.products.edit',[
            'product' => $product,
            "categories" => Category::all(),
            'title' => "Edit Product ".$product->name,
        ]);
    }

    public function create(FormProductRequest $request)
    {
        $this->authorize('create',Product::class);

        $this->productService->create($request);

        return redirect()->back();
    }

    public function edit(FormProductRequest $request, Product $product){
        $this->authorize('update',$product);

        $this->productService->edit($request, $product);

        return redirect()->back();
    }
    
}

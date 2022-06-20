<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\ProductService;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $productService;
    private $size=[
        "h_box" => 96,
        "w_box" => 64,
        "image_size" => 52,
    ];

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function view(Category $category, Request $request)
    {
        $this->authorize('view', $category);

        return view('logged.user.categories.category', [
            "category" => $category,
            "products" => $this->productService->get($category, $request),
            'size' => $this->size,
        ]);
    }

    public function load(Category $category, Request $request)
    {
        $page = $request->input('page', 0);
        $products = $this->productService->get($category, $request, $page);

        if ($products) {
            $html = view('layouts.products.data', [
                'products' => $products,
                'size' => $this->size,
            ])->render();

            // $html = view('logged.shop.products.box_data', [
            //         'products' => $products,
            //         'title' => $category->name,
            //         'wrap' => true,
            //     ]) ->render();
        } else {
            $html = '';
        }

        return response()->json(['html' => $html]);
    }
}

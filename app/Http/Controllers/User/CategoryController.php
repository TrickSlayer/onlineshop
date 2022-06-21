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
    private $product_size=[
        "h_box" => 96,
        "w_box" => 64,
        "image_size" => 52,
    ];

    private $category_size=[
        "h_box" => 72,
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
            'size' => $this->product_size,
            'sortprice' => $request->input('sale_price'),
        ]);
    }

    public function load(Category $category, Request $request)
    {
        $page = $request->input('page', 0);
        $products = $this->productService->get($category, $request, $page);

        if ($products) {
            $html = view('layouts.products.data', [
                'products' => $products,
                'size' => $this->product_size,
            ])->render();
        } else {
            $html = '';
        }

        return response()->json(['html' => $html]);
    }

    public function list(Request $request)
    {
        $this->authorize('viewAny',Category::class);
        $categories = Category::where('active',1)->sortable()->paginate(15);
        return View('logged.user.categories.list', [
            "categories" => $categories,
            "size" => $this->category_size,
        ]);
    }
}

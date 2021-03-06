<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\ProductService;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $productService;
    private $product_size = [
        "h_box" => 96,
        "w_box" => 64,
        "image_size" => 52,
    ];

    private $category_size = [
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
            "products" => $this->productService->getList($category, $request),
            "more" => count($this->productService->getList($category, $request, 1)) > 0,
            'size' => $this->product_size,
            'sortprice' => $request->input('sale_price'),
            'boxInLine' => 4
        ]);
    }

    public function load(Category $category, Request $request)
    {
        $page = $request->input('page', 0);
        $products = $this->productService->getList($category, $request, $page);
        $more = count($this->productService->getList($category, $request, $page + 1)) > 0;
        if ($products) {
            $html = view('layouts.products.data', [
                'products' => $products,
                'size' => $this->product_size,
            ])->render();
        } else {
            $html = '';
        }

        return response()->json(['html' => $html, 'more' => $more]);
    }

    public function list(Request $request)
    {
        $categories = Category::where('active', 1)->sortable()->paginate(15);
        return View('logged.user.categories.list', [
            "categories" => $categories,
            "size" => $this->category_size,
        ]);
    }
}

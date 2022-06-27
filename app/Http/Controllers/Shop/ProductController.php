<?php

namespace App\Http\Controllers\Shop;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormProductRequest;
use App\Http\Services\ProductService;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    
    public function list(Request $request){
        $this->authorize('viewAny',Product::class);

        $shop = Auth::user()->shop;
        $products = Product::sortable()->where('shop_id', $shop->id)->paginate(7);;

        return view("logged.shop.products.list",[
            "request" => $request,
            "filter" => $request->input("filter"),
            "products" => $products,
        ]);
    }

    public function search(Request $request)
    {
        $this->authorize('viewAny',Product::class);
        $shop = Auth::user()->shop;
        $value = $request->input('value', '');
        $products = Product::sortable()->where('shop_id', $shop->id)->where('name', 'like', '%' . $value . '%')->paginate(7);

        if ($products) {
            $html = view('logged.shop.products.table', [
                "products" => $products,
                "filter" => $request->input("filter"),
                "request" => $request,
            ])->render();
        } else {
            $html = '';
        }

        return response()->json(['html'=>$html]);
    }

    public function destroy(Request $request): JsonResponse{
        $id = $request->input('id');
        $product = Product::where('id', $id)->first();

        $this->authorize('delete', $product);

        $url = str_replace("storage","public",$product->thumb);
        if ($product) {
            Storage::delete($url);
            $product->delete();
            return response()->json([
                'error' => false,
                'message' => 'Delete successfully'
            ]);
        }

        return response() -> json([
            'error' => true
        ]);
    }
}

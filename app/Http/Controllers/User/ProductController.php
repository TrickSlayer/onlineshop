<?php

namespace App\Http\Controllers\User;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormProductRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function createView(){
        $this->authorize('create',Product::class);
        $categories = Category::all();
        return View('logged.user.products.create',["categories" => $categories]);
    }

    public function editView(Product $product){
        $this->authorize('update',$product);
        return View('logged.user.products.edit',[
            'product' => $product,
            "categories" => Category::all(),
            'title' => "Edit Product ".$product->name,
        ]);
    }

    public function create(FormProductRequest $request)
    {
        $this->authorize('create',Product::class);

        if ($request->price < $request->sale_price){
            return redirect()->back()->withErrors('Sale price must be smaller price');
        }

        Product::create([
            "name" => $request->input("name"),
            "description" => $request->input("description"),
            "category_id" => $request->input("category_id"),
            "user_id" => Auth::id(),
            "price" => $request->input("price"),
            "sale_price" => $request->input("sale_price"),
            "content" => $request->input("content"),
            "thumb" => $request->input("thumb"),
            "active" => $request->input("active"),
        ]);

        return redirect()->back()->withSuccess('Create product successfully!');
    }

    public function list(Request $request)
    {
        $this->authorize('viewAny',Product::class);
        $products = Product::sortable()->paginate(15);
        return View('logged.user.products.list', [
            "products" => $products,
            "filter" => $request->input("filter"),
        ]);
    }

    public function search(Request $request)
    {
        $this->authorize('viewAny',Product::class);
        $value = $request->input('value', '');
        $categories = Product::sortable()->where('name', 'like', '%' . $value . '%')->paginate(15);

        if ($categories) {
            $html = view('logged.user.products.table', [
                "categories" => $categories,
                "filter" => $request->input("filter"),
            ])->render();
        } else {
            $html = '';
        }

        return response()->json(['html'=>$html]);
    }

    public function destroy(Request $request): JsonResponse{
        $id = $request->input('id');
        $category = Product::where('id', $id)->first();

        $this->authorize('delete', $category);

        $url = str_replace("storage","public",$category->thumb);

        if ($category) {
            Storage::delete($url);
            $category->delete();
            return response()->json([
                'error' => false,
                'message' => 'Delete successfully'
            ]);
        }

        return response() -> json([
            'error' => true
        ]);
    }

    public function edit(FormProductRequest $request, Product $product){
        $this->authorize('update',$product);

        try{
            $product->fill($request->input());
            $product->save();
            Session::flash('success', 'Update successfully');
        } catch (Exception $e){
            Session::flash('Error', 'Error. Try again!!');
            Log::info($e->getMessage());
        }

        return redirect()->back();
    }

    public function product(Product $product)
    {
        $this->authorize('view',$product);
        return $product;
    }
    
}

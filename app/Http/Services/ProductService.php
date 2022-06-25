<?php

namespace App\Http\Services;

use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    const LIMIT = 16;

    public function create(Request $request){
        if ($request->price < $request->sale_price){
            Session::flash("error", "Sale price must be smaller price");
            return false;
        }

        Product::create([
            "name" => $request->input("name"),
            "description" => $request->input("description"),
            "category_id" => $request->input("category_id"),
            "shop_id" => Auth::user()->shop->id,
            "quantity" =>  $request->input("quantity"),
            "price" => $request->input("price"),
            "sale_price" => $request->input("sale_price"),
            "content" => $request->input("content"),
            "thumb" => $request->input("thumb"),
            "active" => $request->input("active"),
        ]);

        Session::flash("error", "Create product successfully!");

        return true;
    }

    public function edit(Request $request, Product $product){
        try{
            $product->fill($request->input());
            $product->save();
            Session::flash('success', 'Update successfully');
            return true;
        } catch (Exception $e){
            Session::flash('Error', 'Error. Try again!!');
            Log::info($e->getMessage());
            return false;
        }
    }

    public function getList(Category $category, $request, $page = 0)
    {
        $collection = self::fillter($category, $request)
            ->skip(self::LIMIT * $page)
            ->take(self::LIMIT);

        return $collection;
    }

    protected function fillter(Category $category, $request){
        $fillter = $request->input('sale_price');

        return Product::where('category_id', $category->id)
        ->when($fillter != null, function ($query) use ($fillter){
            $query->orderBy('sale_price', $fillter);
        })->get();
    }

    public function destroy($request)
    {
        $id = $request->input('id');
        $product = Product::where('id', $id)->first();
        $url = 'public\\' . $product->thumb;

        if ($product) {
            Storage::delete($url);
            $product->delete();
            return true;
        }

        return false;
    }
}

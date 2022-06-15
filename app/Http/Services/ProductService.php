<?php

namespace App\Http\Services;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    const LIMIT = 12;
    
    public function getProducts(Category $category, $request){
        $products = View('logged.shop.products.products_wrap', [
            "title" => $category->name,
            "products" => $this->get($category, $request)
        ])->render();
        return $products;
    }

    public function get(Category $category, $request, $page = 0)
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

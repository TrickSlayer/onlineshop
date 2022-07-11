<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CartController extends Controller
{
    public function myCart(Request $request)
    {
        $carts = $request->session()->get('carts') ?: [];
        [$keys, $values] = Arr::divide($carts);

        $products = Product::whereIn('id', $keys)->get();      

        foreach($products as $key => $product){
            $product->set('quantity', $values[$key]);
        }

        return view('logged.user.cart.mycart', [
            'shops' => $products->sortBy('shop_id')->groupBy('shop_id'),
        ]);
    }

    public function add(Request $request)
    {
        $id = $request->input("id");
        $quantity = $request->input("quantity");
        $carts = $request->session()->get('carts') ?: [];

        if (Arr::exists($carts, $id)) {
            Arr::set($carts, $id, $carts[$id] + $quantity);
        } else {
            $carts = Arr::add($carts, $id, $quantity);
        }

        session(['carts' =>  $carts]);

        return count($carts);
    }

    public function remove(Request $request)
    {
        $id = $request->input("id");
        $carts = $request->session()->get('carts') ?: [];

        Arr::forget($carts, $id);

        session(['carts' =>  $carts]);
        return true;
    }
}

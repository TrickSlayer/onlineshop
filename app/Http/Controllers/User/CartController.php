<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use ErrorException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function myCart(Request $request)
    {
        $carts = $request->session()->get('carts') ?: [];
        [$keys, $values] = Arr::divide($carts);

        $products = Product::whereIn('id', $keys)->get();

        foreach ($products as $key => $product) {
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

    public function change(Request $request)
    {
        $id = $request->input("id");
        $quantity = $request->input("quantity");
        $carts = $request->session()->get('carts') ?: [];

        if (Arr::exists($carts, $id)) {
            Arr::set($carts, $id, $quantity);
        } else {
            return false;
        }

        session(['carts' =>  $carts]);
        return true;
    }

    public function order(Request $request)
    {
        $address = $request->input("address");
        $note = $request->input("note");
        $carts = $request->session()->get('carts') ?: [];

        $cart = Cart::create([
            "user_id" => Auth::id(),
            "address" => $address,
            "note" => $note,
        ]);

        [$ids, $quantity] = Arr::divide($carts);

        $error = "";

        DB::beginTransaction();
        foreach ($ids as $key => $id) {
            $product = Product::where("id", $id);

            try {
                $product->where("quantity", ">", $quantity[$key])
                    ->update(['quantity' => $product->first()->quantity - $quantity[$key]]);

                DB::table("cart_product")->insert([
                    [
                        "cart_id" => $cart->id,
                        "product_id" => $id,
                        "quantity" => $quantity[$key],
                        "created_at" => now(),
                        "updated_at" => now(),
                    ]
                ]);

            } catch (ErrorException $e) {

                if ($error != "") {
                    $error .= ", ";
                }

                $error .= Product::where("id", $id)->first()->name;

            }
        }

        if ($error != "") {
            Session::flash("error", $error.' quantity greater than stock');
            DB::rollBack();
        } else {
            DB::commit();
            $request->session()->forget('carts');
            Session::flash("success", "Order successfully!!");
        }

        return true;
    }

    public function list(Request $request)
    {
        $carts = Cart::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')->get();

        return $carts
            ->map(function ($cart) {

                $shops = $cart->products->groupBy('shop_id');

                return $cart->set("shops", $shops);
            });
    }
}

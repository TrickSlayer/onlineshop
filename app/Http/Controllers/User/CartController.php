<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function myCart(){
        return view('logged.user.cart.mycart');
    }

    public function add(Request $request){
        $id = $request->input("id");
        $quantity = $request->input("quantity");
        $arr = [$id => $quantity];
        session()->set('cart', $arr);
        return $arr;
    }
}

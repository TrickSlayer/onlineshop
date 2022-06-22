<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormShopRequest;
use App\Models\Role;
use App\Models\Shop;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function registerView()
    {
        // $this->authorize('create',Product::class);
        $categories = Shop::all();
        return View('logged.shop.shops.register', ["categories" => $categories]);
    }

    public function register(FormShopRequest $request)
    {
        // $this->authorize('create',Product::class);

        try {
            DB::table('role_user')->create([
                'role_id' => Role::where("name", "shop")->id,
                'user_id' => Auth::id(),
            ]);
        } catch (Exception $e) {
            return redirect()->back()->withErrors("One account can only register 1 shop!");
        }

        Shop::create([
            "name" => $request->input("name"),
            "user_id" => Auth::id(),
            "avatar" => $request->input("thumb"),
            "background" => $request->input("thumb1"),
            "content" => $request->input("content"),
            "active" => $request->input("active"),
        ]);

        return redirect()->back()->withSuccess('Register successfully!');
    }
}

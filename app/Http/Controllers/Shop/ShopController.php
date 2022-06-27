<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormShopRequest;
use App\Http\Services\ProductService;
use App\Models\Role;
use App\Models\Shop;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    private $productService;
    
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

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
        } catch (Exception $e) {
            return redirect()->back()->withErrors("One account can only register 1 shop! " . $e);
        }

        $shop = Role::where("name", "shop")->first();

        DB::table('role_user')->updateOrInsert([
            'role_id' => $shop->id,
            'user_id' => Auth::id(),
        ]);

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

    public function view(Request $request, Shop $shop)
    {
        // $this->authorize('view',Product::class);

        return view("logged.shop.shops.view", [
            "title" => "Shop ". $shop->name,
            "shop" => $shop,
            // "shop" => Auth::user()->shop,
        ]);
    }
}

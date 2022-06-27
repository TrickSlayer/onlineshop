<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormShopRequest;
use App\Http\Services\ProductService;
use App\Http\Services\ShopService;
use App\Models\GroupChat;
use App\Models\Role;
use App\Models\Shop;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    private $productService, $shopService;

    public function __construct(ProductService $productService, ShopService $shopService)
    {
        $this->productService = $productService;
        $this->shopService = $shopService;
    }

    public function registerView()
    {
        $this->authorize('create', Shop::class);
        $categories = Shop::all();
        return View('logged.shop.shops.register', ["categories" => $categories]);
    }

    public function register(FormShopRequest $request)
    {
        $this->authorize('create', Shop::class);

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
        $this->authorize('view', $shop);

        return view("logged.shop.shops.view", [
            "title" => "Shop " . $shop->name,
            "shop" => $shop,
        ]);
    }

    public function chat(Request $request, Shop $shop)
    {
        return redirect("/message/".$this->shopService->findIdGC($shop));
    }
    
}

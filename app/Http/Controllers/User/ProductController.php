<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function view(Product $product)
    {
        $this->authorize('view', $product);

        $comment = $product->comment;

        $sold = DB::table('cart_product')
            ->where("product_id", $product->id);

        $data = Product::where('id', $product->id)->with('shop')->first()
            ->setAttribute("commentCount", count($comment))
            ->setAttribute("starAvg", $comment->avg('star'))
            ->setAttribute("sold", $sold->sum('quantity'));

        return view('logged.user.products.product', [
            "product" => $data,
        ]);
    }
}

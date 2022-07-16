<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormCommentRequest;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function post(FormCommentRequest $request, Product $product)
    {
        $thumb = $request->input("thumb");
        $star = $request->input("star");
        $content = $request->input("content");

        Comment::updateOrCreate(
            [
                "user_id" => Auth::id(),
                "product_id" => $product->id,
            ], 
            [
                "star" => $star,
                "content" => $content,
                "thumb" => $thumb,
            ]
        );

        return redirect()->back();
        
    }

    public function delete(Product $product){
        Comment::where([
            ["product_id", $product->id],
            ["user_id", Auth::id()]
        ])->delete();

        return true;
    }
}

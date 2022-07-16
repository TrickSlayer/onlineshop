<?php

namespace App\View\Components\Comment;

use App\Models\Comment;
use App\Models\Message;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class DataList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $comments, $request, $myComment;

    public function __construct(Product $product, Request $request)
    {
        $fillter = $request->input("star");

        $this->request = $request;

        $this->myComment = Comment::where([
            ["product_id", $product->id],
            ["user_id", Auth::id()]
            ])
        ->with('user')->first();

        $this->comments = Comment::where("product_id", $product->id)
            ->where("user_id", "!=", Auth::id())
            ->when($fillter != null, function ($query) use ($fillter) {
                $query->orderBy('star', $fillter);
            })
            ->with('user')
            ->paginate(5);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.comment.data-list');
    }
}

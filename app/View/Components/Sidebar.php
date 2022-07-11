<?php

namespace App\View\Components;

use App\Http\Services\GroupChatService;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $gcService;
    public $unseen, $cart;

    public function __construct(Request $request)
    {
        $this->gcService = new GroupChatService();
        $this->unseen = $this->gcService->countUnseen();
        $this->cart = count($request->session()->get('carts') ?: []);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar');
    }
}

<?php

namespace App\View\Components\Cart;

use Illuminate\View\Component;

class DataList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $shops;

    public function __construct($shops)
    {
        $this->shops = $shops;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cart.data-list');
    }
}

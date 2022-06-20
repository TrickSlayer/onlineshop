<?php

namespace App\View\Components\product;

use Illuminate\Support\Arr;
use Illuminate\View\Component;

class Data extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $products, $h_box, $w_box, $image_size;

    public function __construct($products, $size)
    {
        $this->products = $products;
        $this->h_box = Arr::exists($size, 'h_box') ? $size['h_box'] : 72;
        $this->w_box = Arr::exists($size, 'w_box') ? $size['w_box'] : 52;
        $this->image_size = Arr::exists($size, 'image_size') ? $size['image_size'] : 40;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product.data');
    }
}

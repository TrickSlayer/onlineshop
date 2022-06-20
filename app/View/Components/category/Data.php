<?php

namespace App\View\Components\category;

use Illuminate\Support\Arr;
use Illuminate\View\Component;

class Data extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $categories, $h_box, $w_box, $image_size;

    public function __construct($categories, $size)
    {
        $this->categories = $categories;
        $this->h_box = Arr::exists($size, 'h_box') ? $size['h_box'] : 36;
        $this->w_box = Arr::exists($size, 'w_box') ? $size['w_box'] : 36;
        $this->image_size = Arr::exists($size, 'image_size') ? $size['image_size'] : 24;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.category.data');
    }
}

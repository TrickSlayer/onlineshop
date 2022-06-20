<?php

namespace App\View\Components\product;

use Illuminate\Support\Arr;
use Illuminate\View\Component;

class DataList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $wrap, $category, $products, $title, $size;

    public function __construct($data, $wrap = 'nonwrap', $size = [])
    {
        $this->wrap = $wrap;
        $this->category = Arr::exists($data, 'category') ? $data['category'] : null;
        $this->title = Arr::exists($data, 'title') ? $data['title'] : '';
        $this->products = $data['products'];
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product.data-list');
    }
}

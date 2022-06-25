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
    public $wrap, $category, $products, $title, $size, $boxInLine;

    public function __construct($data, $wrap = 'nonwrap', $size = [], $boxInLine = 0)
    {
        $this->wrap = $wrap;
        $this->category = Arr::exists($data, 'category') ? $data['category'] : null;
        $this->title = Arr::exists($data, 'title') ? $data['title'] : '';
        $this->products = $data['products'];
        $this->size = $size;
        $this->boxInLine = $boxInLine;
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

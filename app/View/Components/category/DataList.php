<?php

namespace App\View\Components\category;

use Illuminate\Support\Arr;
use Illuminate\View\Component;

class DataList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $wrap, $categories, $title, $size;

    public function __construct($categories, $wrap = 'nonwrap', $size = [])
    {
        $this->wrap = $wrap;
        $this->categories = $categories;
        $this->size = $size;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.category.data-list');
    }
}

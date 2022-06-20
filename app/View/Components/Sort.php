<?php

namespace App\View\Components;

use Illuminate\View\Component;

class sort extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title, $name, $sort;
    public function __construct($name, $sort, $title = '')
    {
        $this->name = $name;
        $this->sort = $sort;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sort');
    }
}

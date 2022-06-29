<?php

namespace App\View\Components\Message;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Message extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $message, $user;

    public function __construct($message)
    {
        $this->message = $message;
        $this->user = Auth::user();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.message.message');
    }
}

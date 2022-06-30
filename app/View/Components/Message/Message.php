<?php

namespace App\View\Components\Message;

use Illuminate\View\Component;

class Message extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $message, $user, $check;

    public function __construct($message, $user = null)
    {
        $this->message = $message;
        $this->user = $user;
        $this->check = ($user == null || $user->name != $message->user->name);
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

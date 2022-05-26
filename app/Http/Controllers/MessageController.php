<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
        $messages = Message::all();
        return view('message',['messages'=> $messages]);
    }

    public function post(Request $request){
        $messages = Message::create($request->all());

        // event(
        //     $e = new SendMessage($messages)
        // );


        return redirect()->back();
    }
}

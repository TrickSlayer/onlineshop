<?php

namespace App\Http\Controllers\User;

use App\Models\GroupChat;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function view(GroupChat $groupChat)
    {
        $this->authorize('view', $groupChat);

        $messages = Message::where("group_chat_id", $groupChat->id)->get();
        return view('message', [
            'messages' => $messages,
            'user' => Auth::user(),
            'group_chat' => $groupChat,
        ]);
    }

    public function sendMessage(Request $request, GroupChat $groupChat)
    {
        $user = Auth::user();
        $messages = Message::create([
            "group_chat_id" => $groupChat->id,
            "user_id" => $user->id,
            "content" => $request->input("content"),
        ]);
        return redirect()->back();
    }
}

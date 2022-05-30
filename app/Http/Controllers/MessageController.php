<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use App\Models\GroupChat;
use App\Models\GroupChatUser;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\XmlConfiguration\Group;

class MessageController extends Controller
{
    public function index(GroupChat $groupChat)
    {
        $this->authorize('view', $groupChat);

        $messages = Message::where("group_chat_id", $groupChat->id)->get();
        return view('message', [
            'messages' => $messages,
            'user' => Auth::user(),
            'group_chat' => $groupChat,
        ]);
    }

    public function post(Request $request, GroupChat $groupChat)
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

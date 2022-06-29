<?php

namespace App\Http\Controllers\User;

use App\Models\GroupChat;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Services\GroupChatService;

class MessageController extends Controller
{
    private $gcService;

    public function __construct(GroupChatService $gcService)
    {
        $this->gcService = $gcService;
    }

    public function view(GroupChat $groupChat)
    {
        $this->authorize('view', $groupChat);

        $this->gcService->seen($groupChat);

        $groups = $this->gcService->getMyGroupChat();

        $messages = Message::where("group_chat_id", $groupChat->id)->get();
        return view('logged.user.message', [
            'messages' => $messages,
            'user' => Auth::user(),
            'group_chat' => $groupChat,
            'groups' => $groups,
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

    public function list(){ 
        return "List";
    }
}

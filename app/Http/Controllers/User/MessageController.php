<?php

namespace App\Http\Controllers\User;

use App\Models\GroupChat;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Services\GroupChatService;
use App\Models\User;

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

        $messages = Message::where("group_chat_id", $groupChat->id)->with(['user', 'groupchat'])->get();
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
        $message = Message::create([
            "group_chat_id" => $groupChat->id,
            "user_id" => $user->id,
            "content" => $request->input("content"),
        ]);

        $current = Message::where('id', $message->id)
            ->with(['user', 'groupchat'])->first();

        $viewA = view("layouts.messages.message", [
            "message" => $current,
            "user" => $user,
        ])->render();

        $viewB = view("layouts.messages.message", [
            "message" => $current,
            "user" => null,
        ])->render();

        return ["htmlA" => $viewA, "htmlB" => $viewB,"message" => $current];
    }

    public function list()
    {
        return "List";
    }
}

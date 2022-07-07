<?php

namespace App\Http\Controllers\User;

use App\Models\GroupChat;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Services\GroupChatService;
use App\Http\Services\MessageService;

class MessageController extends Controller
{
    private $gcService, $messageService;

    public function __construct(GroupChatService $gcService, MessageService $messageService)
    {
        $this->gcService = $gcService;
        $this->messageService = $messageService;
    }

    public function view(GroupChat $groupChat)
    {
        $this->authorize('view', $groupChat);

        $this->gcService->seen($groupChat);

        $groups = $this->gcService->getMyGroupChat();

        $messages = $this->messageService->get($groupChat);

        return view('logged.user.messages.message', [
            'messages' => $messages,
            'user' => Auth::user(),
            'group_chat' => $groupChat,
            'groups' => $groups,
        ]);
    }

    public function load(GroupChat $groupChat, Request $request)
    {
        $this->authorize('view', $groupChat);

        $page = $request->input('page');

        $messages = $this->messageService->get($groupChat, $page);

        $html = '';

        foreach ($messages as $message) {
            $html .= view('layouts.messages.message', [
                'user' => Auth::user(),
                'message' => $message,
            ])->render();
        }

        return response()->json([
            "html" => $html,
            "more" => count($this->messageService->get($groupChat, $page + 1)) > 0
        ]);
    }

    public function sendMessage(Request $request, GroupChat $groupChat)
    {
        $user = Auth::user();

        $message = $this->messageService->create($request, $groupChat);

        return [
            "htmlA" => self::messageBox($message, $user),
            "htmlB" => self::messageBox($message),
            "message" => $message
        ];
    }

    public function messageBox($message, $user = null)
    {
        return view("layouts.messages.message", [
            "message" => $message,
            "user" => $user,
        ])->render();
    }

    public function checkIfSeen(Request $request, GroupChat $groupChat)
    {
        $message = $request->message;

        if ($message["groupchat"]["id"] == $groupChat->id) return false;

        return self::unseen($request);
    }

    public function unseen(Request $request)
    {
        $message = $request->message;

        $group = GroupChat::where('id', $message["groupchat"]["id"])->first();

        $user = Auth::user();

        if ($this->messageService->hasUser($group, $user)) {
            $this->gcService->unseen($group);
            return [
                "check" => true,
                "id" => $group->id,
            ];
        }

        return [
            "check" => false,
            "id" => $group->id,
        ];
    }

    public function countUnseen()
    {
        return $this->gcService->countUnseen();
    }

    public function list()
    {
        $groups = $this->gcService->getMyGroupChat();
        return view('logged.user.messages.list', [
            'user' => Auth::user(),
            'groups' => $groups,
        ]);
    }
}

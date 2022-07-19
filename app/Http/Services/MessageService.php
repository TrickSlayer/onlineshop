<?php

namespace App\Http\Services;

use App\Models\GroupChat;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageService
{
    public function create(Request $request, GroupChat $groupChat)
    {
        $user = Auth::user();
        $content = $request->input("content");
        $thumb = $request->input("thumb");

        if ($content == null && $thumb == null) return null;

        $message = Message::create([
            "group_chat_id" => $groupChat->id,
            "user_id" => $user->id,
            "content" => $content,
            "thumb" => $thumb,
        ]);

        $current = Message::where('id', $message->id)
            ->with(['user', 'groupchat'])->first();

        return $current;
    }

    const LIMIT = 30;

    public function get(GroupChat $groupChat, $page = 0)
    {
        $messages = self::getPage($groupChat, $page);

        return [
            'messages' => $messages,
            'more' => count(self::getPage($groupChat, $page + 1)) > 0 && $messages == self::LIMIT ,
        ];
    }

    public function getPage(GroupChat $groupChat, $page){
        return Message::where("group_chat_id", $groupChat->id)
        ->with(['user', 'groupchat'])->latest()
        ->skip(self::LIMIT * $page)
        ->take(self::LIMIT)->get()
        ->reverse();
    }

    public function hasUser($groupChat, $user)
    {

        if ($groupChat->users->where('id', $user->id)->first()) {
            return true;
        }

        return false;
    }
}

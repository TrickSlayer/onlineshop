<?php

namespace App\Http\Services;

use App\Models\GroupChat;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GroupChatService
{

    public function getMyGroupChat()
    {
        return GroupChat::with('users')
            ->join('group_chat_user', 'group_chats.id', '=', 'group_chat_user.group_chat_id')
            ->where('group_chat_user.user_id', Auth::id())
            ->get();
    }

    public function seen(GroupChat $group)
    {
        DB::table("group_chat_user")
            ->where("group_chat_id", $group->id)
            ->where("user_id", Auth::id())
            ->update(["seen" => 1]);
    }

    public function countUnseen()
    {
        $unseen = DB::table("group_chat_user")
            ->where("user_id", Auth::id())
            ->where("seen", 0)->get();
        return count($unseen);
    }
}

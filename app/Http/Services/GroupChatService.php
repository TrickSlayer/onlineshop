<?php

namespace App\Http\Services;

use App\Models\GroupChat;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GroupChatService
{
    public function getMyGroupChatId()
    {
        $id = GroupChat::with('users')->get()
            ->map(function ($group) {
                $check = $group->users
                    ->map(function ($user) {
                        if ($user->id == Auth::id()) {
                            return $user->id;
                        }
                    })
                    ->reject(function ($name) {
                        return empty($name);
                    });

                if (count($check) >= 1) {
                    return $group->id;
                }
            })->filter();
        try {
            return $id;
        } catch (Exception $e) {
            return null;
        }
    }

    public function getMyGroupChat()
    {
        $ids = self::getMyGroupChatId();
        $groups = $ids->map(function ($id) {
            return GroupChat::where('group_chats.id', $id)
                ->join('group_chat_user', 'group_chats.id', '=', 'group_chat_user.group_chat_id')
                ->where('group_chat_user.user_id', Auth::id())
                ->get();
        })->reject(function ($name) {
            return empty($name);
        })->filter();
        return $groups->collapse();
    }

    public function seen(GroupChat $group){
        DB::table("group_chat_user")
        ->where("group_chat_id", $group->id)
        ->where("user_id", Auth::id())
        ->update(["seen" => 1]);
    }

    public function countUnseen(){
        $unseen = DB::table("group_chat_user")
        ->where("user_id", Auth::id())
        ->where("seen", 0)->get();
        return count($unseen);
    }
}

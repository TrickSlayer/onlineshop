<?php

namespace App\Http\Services;

use App\Models\GroupChat;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageService
{
    public function create(Request $request,GroupChat $groupChat){
        $user = Auth::user();
        $content = $request->input("content");
        $thumb = $request->input("thumb");

        if ( $content == null && $thumb == null) return null;

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

    public function hasUser($groupChat, $user){

        if ($groupChat->users->where('id', $user->id)->first()){
            return true;
        }

        return false;
    }
}

<?php

namespace App\Http\Services;

use App\Models\GroupChat;
use App\Models\Shop;
use Exception;
use Illuminate\Support\Facades\Auth;

class ShopService
{
    public function findIdGC(Shop $shop)
    {
        $id = GroupChat::with('users')->get()
            ->map(function ($group) use ($shop) {
                $check = $group->users
                    ->map(function ($user) use ($shop) {
                        if ($user->id == Auth::id() || $user->id == $shop->user->id) {
                            return $user->id;
                        }
                    })->reject(function ($name) {
                        return empty($name);
                    });


                if (count($check) >= 2) {
                    return $group->id;
                }
            })->filter();
        return $id->first();
    }
}

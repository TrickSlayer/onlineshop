<?php

namespace App\Http\Services;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AccountService
{
    public function create(Request $request, $confirmation_code){
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'confirmation_code' => $confirmation_code,
            'confirmed' => 0,
        ]);
    }

    public function verify($user){
        $user->update([
            'confirmed' => 1,
            'confirmation_code' => null
        ]);
    }

    public function sendRequestResetPassword(Request $request, $token){
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' =>  $token,
            'created_at' => Carbon::now(),
        ]);
    }

    public function checkRequestResetPassword(Request $request){
        return DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token,
        ])-> first();
    }

    public function handleResetPassword(Request $request){

        User::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);

        DB::table('password_resets')->where('email', $request->email)->delete();
    }

    public function changePassword(Request $request){

        if(!Hash::check($request->old_password, Auth::user()->password)){
            Session::flash('error', "Old Password Doesn't match!");

            return false;
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        Session::flash('success', "Password changed successfully!");
        
        return true;

    }
}
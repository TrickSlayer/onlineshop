<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Jobs\VerifyMail;

class AccountController extends Controller
{
    public function Register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'check' => 'accepted'
        ]);

        $confirmation_code = time().uniqid(true);

        VerifyMail::dispatch($request->input('email'), $request->input('name'), $confirmation_code);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'confirmation_code' => $confirmation_code,
            'confirmed' => 0,
        ]);        

        return redirect("login")->withSuccess('Please confirm email');
    }

    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'confirmed' => 1
        ], $request->input('remember'))) {
            return redirect('dashboard');
        }

        Session::flash('error', "Can't login");

        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/home');
    }

    public function verify($code)
    {
        $user = User::where('confirmation_code', $code);

        if ($user->count() > 0) {
            $user->update([
                'confirmed' => 1,
                'confirmation_code' => null
            ]);
            return redirect(route('login'))->withSuccess('Bạn đã xác nhận thành công');
        } else {
            return redirect(route('login'))->withError('Mã xác nhận không chính xác');
        }
    }
}

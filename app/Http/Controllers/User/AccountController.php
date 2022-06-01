<?php

namespace App\Http\Controllers\User;

use App\Jobs\SendMailForgotPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Jobs\VerifyMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function loginView(){
        return View('common.login');
    }

    public function registerView(){
        return View('common.register');
    }

    public function forgotpasswordView(){
        return View('common.forgotpassword');
    }

    public function resetpasswordView(Request $request, $token = null)
    {
        return view('common.resetpassword')->with(['token' => $token, 'email' => $request->email]);
    }

    public function changepasswordView(){
        return View('logged.user.changepassword');
    }

    public function Register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'check' => 'accepted'
        ]);

        $confirmation_code = time() . uniqid(true);

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
            'password' => $request->input('password')
        ], $request->input('remember'))) {
            if (Auth::user()->confirmed == 0){
                Auth::logout();
                Session::flash('error', "Must verify email");
                return redirect()->back();
            }
            return redirect('dashboard');
        }

        Session::flash('error', "Email or password wrong");

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

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $token = Str::random(64);

        SendMailForgotPassword::dispatch($request->email, $token);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' =>  $token,
            'created_at' => Carbon::now(),
        ]);

        return back()->withSuccess("We have e-mail your password reset link!");
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $check_token = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token,
        ])-> first();

        if(!$check_token){
            return back()->withInput()->withErrors('Invalid token');
        } else {
            $date = new Carbon($check_token->created_at);
            if ($date->diffInHours(now()) > 1){
                return back()->withInput()->withErrors('Timeout');
            }

            User::where('email', $request->email)->update([
                'password' => Hash::make($request->password)
            ]);

            DB::table('password_resets')->where('email', $request->email)->delete();

            return redirect()->route('login')->withSuccess('Your password has been changed!')
                ->with('verifiedEmail', $request->email);
        }
    }

    public function changePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        if(!Hash::check($request->old_password, Auth::user()->password)){
            return back()->withErrors("Old Password Doesn't match!");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->withSuccess("Password changed successfully!");
    }
}
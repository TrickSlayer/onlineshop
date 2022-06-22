<?php

namespace App\Http\Controllers\User;


use App\Jobs\SendMailForgotPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Jobs\VerifyMail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Services\AccountService;

class AccountController extends Controller
{
    private $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

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

        $this->accountService->create($request, $confirmation_code);

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
            $this->accountService->verify($user);
            return redirect(route('login'))->withSuccess('You have successfully confirmed');
        } else {
            return redirect(route('login'))->withError('Confirmation code is incorrect');
        }
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $token = Str::random(64);

        SendMailForgotPassword::dispatch($request->email, $token);

        $this->accountService->sendRequestResetPassword($request, $token);

        return back()->withSuccess("We have e-mail your password reset link!");
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $check_token = $this->accountService->checkRequestResetPassword($request);

        if(!$check_token){
            return back()->withInput()->withErrors('Invalid token');
        } else {

            $date = new Carbon($check_token->created_at);

            if ($date->diffInHours(now()) > 1){
                return back()->withInput()->withErrors('Timeout');
            }

            $this->accountService->handleResetPassword($request);

            return redirect()->route('login')->withSuccess('Your password has been changed!')
                ->with('verifiedEmail', $request->email);
        }
    }

    public function changePassword(Request $request){

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $this->accountService->changePassword($request);

        return redirect()->back();
    }
}
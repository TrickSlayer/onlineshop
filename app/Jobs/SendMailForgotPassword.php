<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendMailForgotPassword implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $email;
    protected $token;
    public function __construct($email, $token)
    {
        $this->token = $token;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $action_link = route('user.password.reset',['token'=>$this->token, 'email'=>$this->email]);
        Mail::send(
            'mail.reset',
            ['action_link' => $action_link, 'email' => $this->email],
            function ($message){
                $message->to($this->email)->subject('Reset Password');
            }
        );
    }

    public $uniqueFor = 60;

    //Khoá unique
    public function uniqueId()
    {
        return $this->token;
    }
}

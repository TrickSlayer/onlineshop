<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class VerifyMail implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $email;
    protected $name;
    protected $confirmation_code;

    public function __construct($email, $name, $confirmation_code)
    {
        $this->email = $email;
        $this->name = $name;
        $this->confirmation_code = $confirmation_code;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = ['confirmation_code' => $this->confirmation_code];
        Mail::send('mail.confirm', $data, function($message){
            $message->to($this->email, $this->name)->subject('Welcome to the Shop');;
        });
    }

    public $uniqueFor = 60;

    //Khoá unique
    public function uniqueId(){
        return $this->email;
    }
}

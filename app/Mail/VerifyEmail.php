<?php

namespace App\Mail;

use App\Models\Instructor;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(Instructor $instructor)
    {
        $this->user = $instructor;
    }

    public function build()
    {
        return $this->subject('Verify Your Email Address') 
                     ->markdown('emails.verify_email')// Set the subject line here

            ->with([
                'user' => $this->user,
                'verification_code' => $this->user->verification_code,
            ]);
    }
}


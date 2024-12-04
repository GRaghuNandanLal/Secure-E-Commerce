<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use SerializesModels;

    public $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

    public function build()
    {
        return $this->subject('OTP Request')
                    ->view('emails.otp') // Create this Blade file
                    ->with(['status' => $this->status]);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $employeeName;
    public $token;


    public function __construct($name, $token)
    {
        $this->employeeName = $name;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        $data = array('token' => $this->token, 'name' => $this->employeeName);
        return $this->view('emails.password', $data);
    }
}

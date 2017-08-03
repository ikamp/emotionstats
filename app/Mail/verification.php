<?php

namespace App\Mail;

use App\Model\UserActivation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Queue\ShouldQueue;

class verification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $token;

    public function __construct()
    {
        $userToken = UserActivation::with("employee")
            ->where("employee_id", Auth::id())
            ->get();
        //dd($userToken[0]['token']);
        //die(response()->json($this->$userToken));
        $this->token = $userToken[0]['token'];
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = '0e69f26306-c8cb1f@inbox.mailtrap.io';

        $name = 'Dilara Gozubuyuk';

        $subject = 'Laravel Email';


        return $this->view('emails.verification', ["token" => $this->token]);

    }
}

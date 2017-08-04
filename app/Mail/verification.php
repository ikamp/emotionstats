<?php

namespace App\Mail;

use App\Entity\EmployeeEntity;
use App\Manager\EmployeeManager;
use App\Model\EmployeeModel;
use App\Entity\UserActivationEntity;
use App\Manager\UserActivationManager;
use App\Model\UserActivationModel;
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
        $userToken = UserActivationManager::getByIdWithToken(Auth::id());
        $this->token = $userToken;
        var_dump($userToken);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.verification', ["token" => $this->token]);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Employee extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $employeeId;
    public $employeeMail;
    public $managerName;

    public function __construct($id, $mail, $name)
    {
        $this->employeeId = $id;
        $this->employeeMail = $mail;
        $this->managerName = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = array('employeeId' => $this->employeeId, 'mail' => $this->employeeMail, 'manager' => $this->managerName);
        return $this->view('emails.employee', $data);
    }
}

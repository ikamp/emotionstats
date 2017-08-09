<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Mood extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $employeeId;
    public $employeeName;
    public $moodId;

    public function __construct($id, $name, $moodId)
    {
        $this->employeeId = $id;
        $this->employeeName = $name;
        $this->moodId = $moodId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        $data = array('moodId' => $this->moodId, 'name' => $this->employeeName);
        return $this->view('emails.mood', $data);
    }
}

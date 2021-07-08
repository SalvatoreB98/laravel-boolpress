<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($formData) {
        $this->email = $formData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [ 
           "email" => $this->email
        ];
        return $this->subject($data["email"]["body"])->view('mail.emailForAdmin',$data);
    }
}

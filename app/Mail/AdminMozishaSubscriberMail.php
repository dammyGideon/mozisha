<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminMozishaSubscriberMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function     __construct($data)
    {
        $this->mail_data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hello@mozisha.com', 'Mozisha')->subject('New Subscriber Added')->view('user/mail/admin_mozisha_subscriber', ['mail_data' => $this->mail_data]);
    }
}

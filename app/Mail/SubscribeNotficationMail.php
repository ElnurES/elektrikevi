<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscribeNotficationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $subscribe;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subscribe)
    {
        $this->subscribe=$subscribe;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.subscribe-notfication-mail');
    }
}

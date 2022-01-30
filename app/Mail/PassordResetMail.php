<?php

namespace App\Mail;

use App\Models\PasswordReset;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PassordResetMail extends Mailable
{
    use Queueable, SerializesModels;
    public $passwordReset;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(PasswordReset $passwordReset)
    {
        $this->passwordReset=$passwordReset;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Şifrə yeniləmə linki')
            ->markdown('emails.password-reset-mail');
    }
}

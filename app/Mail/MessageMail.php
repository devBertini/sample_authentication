<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        switch ($this->message['type']) {
            case 'new_user':
                $view = 'emails.user.createUser';
                break;
            case 'recovery_account':
                $view = 'emails.account.recoverAccount';
                break;
            case 'block_account':
                $view = 'emails.account.blockAccount';
                break;
        }

        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
            ->subject($this->message['title'] . ' - ' . env('APP_NAME'))
            ->view($view)
            ->with($this->message);
    }
}

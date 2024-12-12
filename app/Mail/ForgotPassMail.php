<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgotPassMail extends Mailable
{
    use Queueable, SerializesModels;

    public $account;

    public function __construct($account)
    {
        $this->account = $account;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Lấy lại mật khẩu tài khoản',
        );
    }

    public function attachments(): array
    {
        return [];
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.forgot_mail',
        );
    }
}

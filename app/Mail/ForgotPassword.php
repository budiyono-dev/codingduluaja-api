<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct
    (
        public string $token
    )
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Forgot Password Codingduluaja Api',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.template.forgot-password',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

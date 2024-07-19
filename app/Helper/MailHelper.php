<?php

namespace App\Helper;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Mail;

class MailHelper
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function sendEmail()
    {
        $a = (new MailMessage())
            ->line('Klik tombol dibawah ini')
            ->action('tombol', 'localhost:8000')
            ->line('Terimakasih')
            ->greeting('greting')
            ->render()->toHtml();

        Mail::send([], [], function ($message) use ($a) {
            $message->to('budiyono.dev@gmail.com')
                ->subject('my subject')
                ->from('admin@codingduluaja.online')
                ->html($a);
        });
    }
}

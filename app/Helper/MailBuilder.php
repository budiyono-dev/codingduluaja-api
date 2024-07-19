<?php

namespace App\Helper;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Mail;

class MailBuilder
{
    private string $to;

    private string $from;

    private string $subject;

    private string $html;

    public function to(sting $to)
    {
        $this->to = $to;

        return $this;
    }

    public function from(sting $from)
    {
        $this->from = $from;

        return $this;
    }

    public function subject(sting $subject)
    {
        $this->subject = $subject;

        return $this;
    }

    public function html(sting $html)
    {
        $this->html = $html;

        return $this;
    }

    public function send()
    {
        Mail::html($this->html, function ($message) use ($this) {
            $message->to($this->to)
                ->subject($this->subject)
                ->from($this->from);
        });
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

    public function defaultHtml(string $hmtl, string $a)
    {
        Mail::html($hmtl, function ($message) use ($a) {
            $message->to('budiyono.dev@gmail.com')
                ->subject('my subject')
                ->from('admin@codingduluaja.online')
                ->html($a);
        });
    }
}

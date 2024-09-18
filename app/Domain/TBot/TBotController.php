<?php

namespace App\Domain\TBot;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Telegram\Bot\Laravel\Facades\Telegram;

class TBotController
{
    public function info(Request $request)
    {
        $response = Telegram::bot('mybot')->getMe();

        return response()->json($response);
    }

    public function sendDummyChat(Request $request)
    {
        Telegram::sendMessage([
            'chat_id' => '265562078',
            'text' => 'Hello world!',
        ]);
    }

    public function webhook(Request $request, string $token)
    {
        info('hoook telegram hited '.$token);
        if ($token !== env('TELEGRAM_BOT_TOKEN')) {
            info('telegram token not match');

            return 'error';
        }
        $req = $request->all();
        $text = $req['message']['text'] ?? null;

        if (! is_null($text) && str_starts_with($text, '/')) {
            $this->processChat($req);
        }
        $this->processCommand();

        return 'ok';
    }

    private function processCommand()
    {
        Telegram::commandsHandler(true);
    }

    private function processChat() {}

    public function registerWebHook(Request $request)
    {
        Telegram::removeWebhook();
        $configUrl = env('TELEGRAM_WEBHOOK_URL');
        info('update telegram webhook', ['url' => $configUrl]);
        $token = env('TELEGRAM_BOT_TOKEN');
        $finalUrl = Str::replaceFirst(':token', $token, $configUrl);
        $update = Telegram::setWebhook(['url' => $finalUrl]);

        return response()->json($update);
    }

    public function refreshCommand()
    {
        Telegram::addCommands([
            TComand::class,
            TComand1::class,
            TComand2::class,
            TComand3::class,
        ]);

        return response()->json('ok');
    }
}

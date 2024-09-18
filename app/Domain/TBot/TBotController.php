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

    public function webhook(Request $request, String $token)
    {
        info('hoook telegram hited '.$token);
        info('data ', ['request'=>$request->all()]);
        $enableHandler = Telegram::commandsHandler(true);
        info('enable comand handler for telegram webhook ', ['data'=> $enableHandler]);

        return 'ok';
    }

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

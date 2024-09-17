<?php

use Illuminate\Support\Facades\Route;

Route::post('/telegram/webhook/register', function () {
    info('hoook telegram hited');
    $update = Telegram\Bot\Laravel\Facades\Telegram::setWebhook(['url' => env('TELEGRAM_WEBHOOK_URL')]);

    return response()->json($update);
});


Route::get('/telegram/check', function () {
    $response = Telegram\Bot\Laravel\Facades\Telegram::bot('mybot')->getMe();
    return response()->json($response);
});

Route::get('/telegram/update', function () {
    $updates = Telegram\Bot\Laravel\Facades\Telegram::getUpdates();
    return response()->json($updates);
});

Route::get('/telegram/sendmessage', function() {
    Telegram\Bot\Laravel\Facades\Telegram::sendMessage([
        'chat_id' => '265562078',
        'text' => 'Hello world!'
    ]);
    return;
});


Route::post('/telegram/7452519914:AAG_sK1B9VlYyjGTaug_NAA1_MJvMQ6YbPM/webhook', function () {
    info('hoook telegram hited');
    $enableHandler = Telegram\Bot\Laravel\Facades\Telegram::commandsHandler(true);
    info('enable comand handler for telegram webhook '.json_encode($enableHandler));
    // $updates = Telegram\Bot\Laravel\Facades\Telegram::getWebhookUpdate();
    // info('incoming webhook message '.json_encode($updates));
    return 'ok';
});

require __DIR__.'/api/todolist.php';
require __DIR__.'/api/wilayah.php';
require __DIR__.'/api/user.php';

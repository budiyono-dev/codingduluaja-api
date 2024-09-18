<?php

use App\Domain\TBot\TBotController;
use Illuminate\Support\Facades\Route;

Route::group([
    'controller' => TBotController::class,
    'prefix' => '/telegram',
], function () {

    Route::post('/webhook/register', 'registerWebHook');
    Route::get('/info', 'info');
    Route::post('/sendmessage', 'sendDummyChat');
    Route::post('/{token}/webhook', 'webhook');
    Route::post('/refresh-command', 'refreshCommand');
});

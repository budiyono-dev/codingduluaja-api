<?php

namespace App\Console\Commands;

use App\Models\ClientToken;
use Illuminate\Console\Command;

class ClientTokenHouseKeeping extends Command
{
    protected $signature = 'app:token-hk';

    protected $description = 'Clear expired and non-active tokens from database';

    public function handle()
    {
        info('[Schedule] house keeping, clear expired tokens and inactive tokens');
        $inActiveToken = ClientToken::select('id')->where('is_active', false)->get();
        ClientToken::query()->whereI
        // $ct = ClientToken::select(['id','exp', 'is_active'])->get()->filter(function (ClientToken $token) {
        //     return ! $token->is_active || $token->exp < time();
        // })->all()->pluck('id');
        dd($inActiveToken);
        // if ($ct->isEmpty()) {
        //     info('Schedule');

        //     return;
        //     $ct->delete();
        // }
    }
}

<?php

use App\Console\Commands\ClientTokenHouseKeeping;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote')->hourly();

Schedule::command(ClientTokenHouseKeeping::class)->dailyAt('01:30')
    ->onSuccess(function () {
        info('[token.SCHEDULE] SUCCESS run schedule token house keeping.');
    })
    ->onFailure(function () {
        info('[token.SCHEDULE] FAILED run schedule token house keeping.');
    });

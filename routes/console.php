<?php

use App\Console\Commands\ClientTokenHouseKeeping;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command(ClientTokenHouseKeeping::class)->everyMinute()
    ->onSuccess(function () {
        info('[Schedule] success run schedule token house keeping.');
    })
    ->onFailure(function () {
        info('[Schedule] failed run schedule token house keeping.');
    });

<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'controller' => App\Domain\Raport\Controllers\SiswaController::class,
    'prefix' => '/raport',
], function () {
    Route::get('', 'indexWeb');
});

<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'controller' => App\Http\Controllers\Api\Raport\SiswaController::class,
    'prefix' => '/raport',
], function () {
    Route::get('', 'indexWeb');
});


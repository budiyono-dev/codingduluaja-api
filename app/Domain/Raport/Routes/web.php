<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'controller' => App\Domain\Raport\Controllers\SiswaController::class,
    'prefix' => '/raport',
], function () {
    Route::get('', 'indexWeb');
});

Route::group([
    'controller' => App\Domain\Raport\Controllers\AdminController::class,
    'prefix' => '/raport/admin',
], function () {
    Route::get('', 'index');
});

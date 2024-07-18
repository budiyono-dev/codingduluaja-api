<?php

use App\Http\Controllers\AppManagerController;
use App\Http\Controllers\AppResourceController;
use App\Http\Controllers\ClientAppController;
use Illuminate\Support\Facades\Route;

/**
 * Application Route
 */
Route::group([
    'mideleware' => ['auth', 'verified', 'menu-access'],
    'controller' => AppResourceController::class,
    'prefix' => '/app/resource',
], function () {
    Route::get('', 'index')->name('page.appResource');
    Route::post('', 'addResource')->name('do.addResource');
    Route::post('/delete/{id}', 'delete')->name('do.deleteResource');
    Route::post('/connect/{id}', 'connectClient')->name('do.connectClient');
    Route::post('/disconnect/{id}', 'disconnectClient')->name('do.disconnectClient');
});
Route::group([
    'mideleware' => ['auth', 'verified', 'menu-access'],
    'controller' => ClientAppController::class,
    'prefix' => '/app/client',
], function () {
    Route::get('', 'index')->name('page.clientApp');
    Route::post('', 'createApp')->name('do.createApp');
    Route::post('/delete/{id}', 'delete')->name('do.deleteClientApp');
});

Route::group([
    'mideleware' => ['auth', 'verified', 'menu-access'],
    'controller' => AppManagerController::class,
    'prefix' => '/app/manager',
], function () {
    Route::get('', 'index')->name('page.appManager');
    Route::post('/token', 'generateToken')->name('do.generateToken');
    Route::get('/token/{resource}/{app}', 'showToken')->name('do.showToken');
    Route::post('/token/revoke', 'revokeToken')->name('do.revoveToken');
});

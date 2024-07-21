<?php

use App\Http\Controllers\Application\AppClientController;
use App\Http\Controllers\AppManagerController;
use App\Http\Controllers\AppResourceController;
use App\Http\Controllers\ClientAppController;
use Illuminate\Support\Facades\Route;

/**
 * Application Route
 */
$middleware = ['auth', 'verified', 'menu-access'];

Route::group([
    'mideleware' => $middleware,
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
    'mideleware' => $middleware,
    'controller' => AppClientController::class,
    'prefix' => '/app/client',
], function () {
    Route::get('', 'index')->name('page.app.client');
    Route::get('/create', 'pageCreate')->name('page.app.createClient');
    Route::post('/create', 'doCreate')->name('do.app.createClient');
    Route::get('/edit', 'pageEdit')->name('page.app.editClient');
    Route::post('/edit', 'doEdit')->name('do.app.editClient');
    Route::post('/delete', 'doDelete')->name('do.app.deleteClient');
});

Route::group([
    'mideleware' => $middleware,
    'controller' => ClientAppController::class,
    'prefix' => '/app/client',
], function () {
    // Route::get('', 'index')->name('page.appClient');
    Route::post('', 'createApp')->name('do.createApp');
    Route::post('/delete/{id}', 'delete')->name('do.deleteClientApp');
});

Route::group([
    'mideleware' => $middleware,
    'controller' => AppManagerController::class,
    'prefix' => '/app/manager',
], function () {
    Route::get('', 'index')->name('page.appManager');
    Route::post('/token', 'generateToken')->name('do.generateToken');
    Route::get('/token/{resource}/{app}', 'showToken')->name('do.showToken');
    Route::post('/token/revoke', 'revokeToken')->name('do.revoveToken');
});

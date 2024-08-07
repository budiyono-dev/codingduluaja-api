<?php

use App\Http\Controllers\Application\AppClientController;
use App\Http\Controllers\Application\AppManagerController;
use App\Http\Controllers\Application\AppResourceController;
use Illuminate\Support\Facades\Route;

/**
 * Application Route
 */
$middleware = ['auth', 'verified', 'menuAccess'];

Route::group([
    'middleware' => $middleware,
    'controller' => AppResourceController::class,
    'prefix' => '/app/resource',
], function () {
    Route::get('', 'index')->name('app.resource');
    Route::get('/create', 'pageCreate')->name('app.resource.create');
    Route::post('/create', 'doCreate')->name('app.resource.doCreate');
    Route::post('/delete', 'doDelete')->name('app.resource.doDelete');
});

Route::group([
    'middleware' => $middleware,
    'controller' => AppClientController::class,
    'prefix' => '/app/client',
], function () {
    Route::get('', 'index')->name('app.client');
    Route::get('/create', 'pageCreate')->name('app.client.create');
    Route::post('/create', 'doCreate')->name('app.client.doCreate');
    Route::get('/edit/{id}', 'pageEdit')->name('app.client.edit');
    Route::post('/edit', 'doEdit')->name('app.client.doEdit');
    Route::post('/delete', 'doDelete')->name('app.client.doDelete');
});

Route::group([
    'middleware' => $middleware,
    'controller' => AppManagerController::class,
    'prefix' => '/app/manager',
], function () {
    Route::get('', 'index')->name('app.manager');
    Route::get('/connect/{resourceId}', 'pageConnect')->name('app.manager.connect');
    Route::post('/connect', 'doConnect')->name('app.manager.doConnect');
    Route::get('/token', 'doShowToken')->name('app.manager.showToken');
    Route::post('/token/revoke', 'doRevokeToken')->name('app.manager.revokeToken');
    Route::post('/token/create', 'doCreateToken')->name('app.manager.createToken');
    Route::post('/disconnect', 'doDisconnect')->name('app.manager.disconnect');
});

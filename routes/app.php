<?php

use App\Http\Controllers\Application\AppClientController;
use App\Http\Controllers\Application\AppManagerController;
use App\Http\Controllers\Application\AppResourceController;
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
    Route::get('', 'index')->name('page.app.resource');
    Route::get('/create', 'pageCreate')->name('page.app.resource.create');
    Route::post('/create', 'doCreate')->name('do.app.resource.create');
    Route::post('/delete', 'doDelete')->name('do.app.eesource.delete');
});

Route::group([
    'mideleware' => $middleware,
    'controller' => AppClientController::class,
    'prefix' => '/app/client',
], function () {
    Route::get('', 'index')->name('page.app.client');
    Route::get('/create', 'pageCreate')->name('page.app.client.create');
    Route::post('/create', 'doCreate')->name('do.app.client.create');
    Route::get('/edit/{id}', 'pageEdit')->name('page.app.client.edit');
    Route::post('/edit', 'doEdit')->name('do.app.client.edit');
    Route::post('/delete', 'doDelete')->name('do.app.client.delete');
});

Route::group([
    'mideleware' => $middleware,
    'controller' => AppManagerController::class,
    'prefix' => '/app/manager',
], function () {
    Route::get('', 'index')->name('page.app.manager');
    Route::get('/connect/{resourceId}', 'pageConnect')->name('page.app.manager.connect');
    Route::post('/connect', 'doConnect')->name('do.app.manager.connect');
    Route::get('/token', 'doShowToken')->name('do.app.manager.token');
    Route::post('/token/revoke', 'doRevokeToken')->name('do.app.manager.revoke');
    Route::post('/token/create', 'doCreateToken')->name('do.app.manager.create');
});

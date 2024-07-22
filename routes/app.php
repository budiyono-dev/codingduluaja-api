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
    Route::get('/create', 'pageCreate')->name('page.app.createResource');
    Route::post('/create', 'doCreate')->name('do.app.createResource');
    Route::get('/connect/{id}', 'doCreate')->name('page.app.connectedResource');
    Route::post('/delete', 'doDelete')->name('do.app.deleteResource');
});

Route::group([
    'mideleware' => $middleware,
    'controller' => AppClientController::class,
    'prefix' => '/app/client',
], function () {
    Route::get('', 'index')->name('page.app.client');
    Route::get('/create', 'pageCreate')->name('page.app.createClient');
    Route::post('/create', 'doCreate')->name('do.app.createClient');
    Route::get('/edit/{id}', 'pageEdit')->name('page.app.editClient');
    Route::post('/edit', 'doEdit')->name('do.app.editClient');
    Route::post('/delete', 'doDelete')->name('do.app.deleteClient');
});

Route::group([
    'mideleware' => $middleware,
    'controller' => AppManagerController::class,
    'prefix' => '/app/manager',
], function () {
    Route::get('', 'index')->name('page.app.manager');
    Route::get('/connect/{resourceId}', 'pageConnect')->name('page.app.connectManager');
    Route::post('/connect', 'doConnect')->name('do.app.connectManager');
    Route::post('/token/revoke', 'doRevokeToken')->name('do.app.connectManager');
    Route::post('/token/create', 'doCreateToken')->name('do.app.connectManager');
});

//Route::group([
//    'mideleware' => $middleware,
//    'controller' => AppManagerController::class,
//    'prefix' => '/app/manager',
//], function () {
//    //    Route::get('', 'index')->name('page.appManager');
//    Route::post('/token', 'generateToken')->name('do.generateToken');
//    Route::get('/token/{resource}/{app}', 'showToken')->name('do.showToken');
//    Route::post('/token/revoke', 'revokeToken')->name('do.revoveToken');
//});

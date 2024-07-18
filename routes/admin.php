<?php

use App\Http\Controllers\Admin\LoggingController;
use App\Http\Controllers\Admin\MenuAccessController;
use App\Http\Controllers\Admin\MigrationController;
use App\Http\Controllers\Admin\SiteController;
use Illuminate\Support\Facades\Route;

/**
 * Admin Route
 */
Route::group([
    'mideleware' => ['auth', 'verified', 'isAdmin'],
    'controller' => MenuAccessController::class,
    'prefix' => '/admin/menu-access',
], function () {
    Route::get('', 'index')->name('page.admin.menuAccess');
    Route::post('/edit', 'doEdit')->name('do.admin.editMenuAccess');
    Route::get('/create', 'pageCreate')->name('page.admin.addMenuAccess');
    Route::post('/create', 'doCreate')->name('do.admin.createMenuAccess');
    Route::post('/user', 'doChangeUserMenuAccess')->name('do.admin.changeUserMenuAccess');
    Route::get('/{id}', 'pageEdit')->name('page.admin.editMenuAccess');
    Route::post('/{id}', 'doDelete')->name('do.admin.deleteMenuAccess');
});

Route::group([
    'mideleware' => ['auth', 'verified', 'isAdmin'],
    'controller' => MigrationController::class,
    'prefix' => '/admin/menu-access',
], function () {
    Route::get('/admin/migration', 'index')->name('page.admin.migration');

});

Route::group([
    'mideleware' => ['auth', 'verified', 'isAdmin'],
    'controller' => SiteController::class,
    'prefix' => '/admin/menu-access',
], function () {
    Route::get('/admin/site', 'index')->name('page.admin.site');

});

Route::group([
    'mideleware' => ['auth', 'verified', 'isAdmin'],
    'controller' => LoggingController::class,
    'prefix' => '/admin/menu-access',
], function () {
    Route::get('/admin/logging', 'index')->name('page.admin.logging');

});

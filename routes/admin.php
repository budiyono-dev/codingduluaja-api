<?php

use App\Http\Controllers\Admin\LoggingController;
use App\Http\Controllers\Admin\MenuAccessController;
use App\Http\Controllers\Admin\MigrationController;
use App\Http\Controllers\Admin\SiteController;
use Illuminate\Support\Facades\Route;

/**
 * Admin Route
 */
$middleware = ['auth', 'verified', 'isAdmin'];

Route::group([
    'middleware' => $middleware,
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
    'middleware' => $middleware,
    'controller' => MigrationController::class,
    'prefix' => '/admin/migration',
], function () {
    Route::get('', 'index')->name('page.admin.migration');
    Route::post('/migrate', 'doMigrate')->name('do.admin.migrateMigration');
    Route::post('/seed', 'doSeed')->name('do.admin.seedMigration');
});

Route::group([
    'middleware' => $middleware,
    'controller' => LoggingController::class,
    'prefix' => '/admin/logging',
], function () {
    Route::get('', 'index')->name('page.admin.logging');
    Route::post('/logs', 'doDownloadLogs')->name('do.admin.downloadLogging');
});

Route::group([
    'middleware' => $middleware,
    'controller' => SiteController::class,
    'prefix' => '/admin/site',
], function () {
    Route::get('', 'index')->name('page.admin.site');
    Route::post('/down', 'down')->name('do.admin.downSite');
    Route::post('/up', 'up')->name('do.admin.upSite');
});

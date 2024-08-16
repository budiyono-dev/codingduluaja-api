<?php

use App\Http\Controllers\Admin\LoggingController;
use App\Http\Controllers\Admin\MenuAccessController;
use App\Http\Controllers\Admin\MigrationController;
use App\Http\Controllers\Admin\OptimizeController;
use App\Http\Controllers\Admin\SiteController;
use App\Http\Controllers\Feedback\ReportController;
use Illuminate\Support\Facades\Route;

$middleware = ['auth', 'verified', 'isAdmin'];

Route::group([
    'middleware' => $middleware,
    'controller' => MenuAccessController::class,
    'prefix' => '/admin/menu-access',
], function () {
    Route::get('', 'index')->name('admin.menuAccess');
    Route::post('/edit', 'doEdit')->name('admin.menuAccess.doEdit');
    Route::get('/create', 'pageCreate')->name('admin.menuAccess.create');
    Route::post('/create', 'doCreate')->name('admin.menuAccess.doCreate');
    Route::post('/user', 'doChangeUserMenuAccess')->name('admin.menuAccess.user');
    Route::post('/delete', 'doDelete')->name('admin.menuAccess.doDelete');
    Route::get('/{id}', 'pageEdit')->name('admin.menuAccess.edit');
});

Route::group([
    'middleware' => $middleware,
    'controller' => MigrationController::class,
    'prefix' => '/admin/migration',
], function () {
    Route::get('', 'index')->name('admin.migration');
    Route::post('/migrate', 'doMigrate')->name('admin.migration.migrate');
    Route::post('/seed', 'doSeed')->name('admin.migration.seed');
});

Route::group([
    'middleware' => $middleware,
    'controller' => LoggingController::class,
    'prefix' => '/admin/logging',
], function () {
    Route::get('', 'index')->name('admin.logging');
    Route::post('/logs', 'doDownloadLogs')->name('admin.logging.download');
});

Route::group([
    'middleware' => $middleware,
    'controller' => SiteController::class,
    'prefix' => '/admin/site',
], function () {
    Route::get('', 'index')->name('admin.site');
    Route::post('/down', 'down')->name('admin.site.down');
    Route::post('/up', 'up')->name('admin.site.up');
});

Route::group([
    'middleware' => $middleware,
    'controller' => OptimizeController::class,
    'prefix' => '/admin/optimize',
], function () {
    Route::get('', 'index')->name('admin.optimize');
    Route::post('/optimize', 'optimize')->name('admin.optimize.optimize');
});

Route::group([
    'middleware' => $middleware,
    'controller' => ReportController::class,
    'prefix' => '/admin/report',
], function () {
    Route::get('', 'indexAdmin')->name('admin.feedback');
    Route::get('/{id}', 'pageDetail')->name('admin.feedback.detail');
});

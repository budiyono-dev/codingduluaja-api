<?php

use App\Http\Controllers\Admin\LoggingController;
use App\Http\Controllers\Admin\MenuAccessController;
use App\Http\Controllers\Admin\MigrationController;
use App\Http\Controllers\Admin\SiteController;
use App\Http\Controllers\Api\ToDoListController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\WilayahController;
use App\Http\Controllers\AppManagerController;
use App\Http\Controllers\AppResourceController;
use App\Http\Controllers\ClientAppController;
use App\Http\Controllers\DeploymentController;
use App\Http\Controllers\DocController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ToolsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/**
 * Auth Route
 */

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

Route::group([
    'mideleware' => ['auth', 'verified', 'menu-access'],
    'controller' => DocController::class,
    'prefix' => '/app/doc',
], function () {
    Route::get('/todolist', 'todolist')->name('page.doc.todolist');
    Route::get('/wilayah/bps', 'wilayahBps')->name('page.doc.wilayahBps');
    Route::get('/wilayah/dagri', 'wilayahDagri')->name('page.doc.wilayahDagri');
    Route::get('/user', 'userApi')->name('page.doc.userApi');
});

Route::group([
    'mideleware' => ['auth', 'verified', 'menu-access'],
    'controller' => DocController::class,
    'prefix' => '/app/res',
], function () {
    Route::controller(ToDoListController::class)->group(function () {
        Route::get('/todolist', 'todolist')->name('page.res.todolist');
        Route::post('/todolist/dummy', 'generateDummy')->name('do.todolist.dummy');
    });
    Route::controller(WilayahController::class)->group(function () {
        Route::get('/wilayah/bps', 'indexBps')->name('page.res.wilayahBps');
        Route::get('/wilayah/dagri', 'indexDagri')->name('page.res.wilayahDagri');
        Route::get('/wilayah/bps/{wilayah}/{id}', 'findBps')->name('page.res.findBps');
        Route::get('/wilayah/dagri/{wilayah}/{id}', 'findDagri')->name('page.res.findDagri');
    });
    Route::controller(UserApiController::class)->group(function () {
        Route::get('/user', 'index')->name('page.res.userApi');
        Route::post('/user/dummy', 'dummy')->name('do.userApi.dummy');
    });
});

Route::group([
    'mideleware' => ['auth', 'verified', 'menu-access'],
    'controller' => ToolsController::class,
    'prefix' => '/app/tools',
], function () {
    Route::get('/base64', 'base64')->name('page.tools.base64');

});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // Route::view('/dasboard', 'page.welcome')->name('page.dashboard');
    // Route::post('/logout', [AuthController::class, 'logout'])->name('do.logout');
});

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

Route::middleware(['auth', 'verified', 'isAdmin'])->group(function () {
    Route::controller(DeploymentController::class)->group(function () {
        Route::get('cda-su/{id}', 'index')->name('page.su');
        Route::post('cda-su/{id}', 'doAction')->name('do.su.action');
        Route::get('cda-su-check/smtp-test-mail', 'sendTestMail')->name('do.su.sendTestMail');
    });
});

/**
 * Public Route
 */
Route::get('/cda-refresh-config', [DeploymentController::class, 'refreshAdminConfig']);
// Route::get('/user/check-username/{username}', [AuthController::class, 'checkUsername'])->name('checkUsername');
Route::view('/', 'page.landing-page')->name('page.langind-page');

require __DIR__.'/auth.php';

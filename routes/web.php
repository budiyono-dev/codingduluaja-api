<?php

use App\Http\Controllers\Api\ToDoListController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\WilayahController;
use App\Http\Controllers\AppManagerController;
use App\Http\Controllers\AppResourceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientAppController;
use App\Http\Controllers\DeploymentController;
use App\Http\Controllers\DocController;
use App\Http\Controllers\ToolsController;
use Illuminate\Support\Facades\Route;

/**
 * Auth Route
 */
Route::middleware('auth')->group(function () {
    Route::view('/dasboard', 'page.welcome')->name('page.dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('do.logout');

    Route::middleware('menu-access')->group(function () {
        Route::prefix('/app')->group(function () {
            Route::controller(AppResourceController::class)->group(function () {
                Route::prefix('/resource')->group(function () {
                    Route::get('', 'index')->name('page.appResource');
                    Route::post('', 'addResource')->name('do.addResource');
                    Route::post('/delete/{id}', 'delete')->name('do.deleteResource');
                    Route::post('/connect/{id}', 'connectClient')->name('do.connectClient');
                    Route::post('/disconnect/{id}', 'disconnectClient')->name('do.disconnectClient');
                });
            });

            Route::controller(ClientAppController::class)->group(function () {
                Route::prefix('/client')->group(function () {
                    Route::get('', 'index')->name('page.clientApp');
                    Route::post('', 'createApp')->name('do.createApp');
                    Route::post('/delete/{id}', 'delete')->name('do.deleteClientApp');
                });
            });

            Route::controller(AppManagerController::class)->group(function () {
                Route::prefix('/manager')->group(function () {
                    Route::get('', 'index')->name('page.appManager');
                    Route::post('/token', 'generateToken')->name('do.generateToken');
                    Route::get('/token/{resource}/{app}', 'showToken')->name('do.showToken');
                    Route::post('/token/revoke', 'revokeToken')->name('do.revoveToken');
                });
            });
        });

        Route::controller(DocController::class)->group(function () {
            Route::prefix('/doc')->group(function () {
                Route::get('/todolist', 'todolist')->name('page.doc.todolist');
                Route::get('/wilayah/bps', 'wilayahBps')->name('page.doc.wilayahBps');
                Route::get('/wilayah/dagri', 'wilayahDagri')->name('page.doc.wilayahDagri');
                Route::get('/user', 'userApi')->name('page.doc.userApi');
            });
        });

        Route::prefix('/res')->group(function () {
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

        Route::controller(ToolsController::class)->group(function () {
            Route::prefix('/tools')->group(function () {
                Route::get('/base64', 'base64')->name('page.tools.base64');
            });
        });
    });
});


/**
 * Non Auth Route
 */
Route::middleware('non-auth')->group(function () {
    Route::view('/login', 'page.login')->name('page.login');
    Route::post('/login', [AuthController::class, 'login'])->name('do.login');

    Route::view('/register', 'page.register')->name('page.register');
    Route::post('/register', [AuthController::class, 'register'])->name('do.register');

    Route::view('/forgot-password', 'page.forgot-password')->name('page.forgot-password');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('do.forgotPassword');
    Route::get('/forgot-password/validate', [AuthController::class, 'validateForgotPassword'])
        ->name('do.validateForgotPassword');

    Route::view('/reset-password', 'page.reset-password')->name('page.resetPassword');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('do.resetPassword');
});

/**
 * Admin Route
 */
Route::middleware('auth')->group(function () {
    Route::controller(DeploymentController::class)->group(function () {
        Route::get('cda-su/{id}', 'index')->name('page.su');
        Route::post('cda-su/{id}', 'doAction')->name('do.su.action');
        Route::get('cda-su-check/smtp-test-mail', 'sendTestMail')->name('do.su.sendTestMail');
    });

    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/menu-access', 'pageMenuAccess')->name('page.admin.menuAccess');
        Route::post('/admin/migration', 'pageMigration')->name('page.admin.migration');
        Route::get('/admin/logging', 'pageLogging')->name('page.admin.logging');
    });
});

    //    MigrationUtils::addMenuItem(1, $adminMnu->id, 'menu.item.admin_menu_access', 'page.admin.menuAccess', 1);
    //    MigrationUtils::addMenuItem(2, $adminMenu->id, 'menu.item.admin_migration', 'page.admin.migration', 2);
    //    MigrationUtils::addMenuItem(3, $adminMenu->id, 'menu.item.admin_logging', 'page.admin.logging', 3);

/**
 * Public Route
 */
Route::get('/cda-refresh-config', [DeploymentController::class, 'refreshAdminConfig']);
Route::get('/user/check-username/{username}', [AuthController::class, 'checkUsername'])->name('checkUsername');
Route::view('/', 'page.landing-page')->name('page.langind-page');

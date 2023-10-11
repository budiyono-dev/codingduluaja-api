<?php

use App\Http\Controllers\AppManagerController;
use App\Http\Controllers\AppResourceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientAppController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::view('/', 'page.welcome')->name('page.dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('do.logout');

    Route::controller(AppResourceController::class)->group(function () {
        Route::prefix('/app-resource')->group(function () {
            Route::get('', 'index')->name('page.appResource');
            Route::post('', 'addResource')->name('do.addResource');
            Route::post('/delete/{id}', 'delete')->name('do.deleteResource');
            Route::post('/connect/{id}', 'connectClient')->name('do.connectClient');
            Route::post('/disconnect/{id}', 'disconnectClient')->name('do.disconnectClient');
        });
    });

    Route::controller(ClientAppController::class)->group(function () {
        Route::prefix('/app-client')->group(function () {
            Route::get('', 'index')->name('page.clientApp');
            Route::post('', 'createApp')->name('do.createApp');
            Route::post('/delete/{id}', 'delete')->name('do.deleteClientApp');
        });
    });

    Route::controller(AppManagerController::class)->group(function () {
        Route::prefix('/app-manager')->group(function () {
            Route::get('', 'index')->name('page.appManager');
            Route::post('/token', 'generateToken')->name('do.generateToken');
            Route::get('/token/{resource}/{app}', 'showToken')->name('do.showToken');
        });
    });
});

Route::middleware('non-auth')->group(function () {
    Route::view('/login', 'page.login')->name('page.login');
    Route::view('/register', 'page.register')->name('page.register');
    Route::post('/register', [AuthController::class, 'register'])->name('do.register');
    Route::post('/login', [AuthController::class, 'login'])->name('do.login');
});


Route::get('/user/check-username/{username}', [AuthController::class, 'checkUsername'])->name('checkUsername');

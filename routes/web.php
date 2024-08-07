<?php

use App\Http\Controllers\DeploymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
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
Route::view('/', 'page.landing-page')->name('page.langind-page');
// breeze
require __DIR__.'/auth.php';

require __DIR__.'/web/admin.php';
require __DIR__.'/web/app.php';
require __DIR__.'/web/doc.php';
require __DIR__.'/web/res.php';
require __DIR__.'/web/tools.php';

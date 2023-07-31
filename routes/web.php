<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::middleware('auth')->group(function () {
    Route::view('/', 'page.welcome')->middleware('auth')->name('page.dashboard');
    Route::get('/home', function () {
        return 'this is home route';
    });

    Route::get('/navbar', function () {
        return view('navbar');
    });

    Route::get('/get-data', function () {
        return trans('validation.required', ['field' => 'first name', 's' => 'skdjbfksjd']);
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('do.logout');
});

Route::middleware('non-auth')->group(function () {
    Route::view('/login', 'page.login')->name('page.login');
    Route::view('/register', 'page.register');
    Route::post('/register', [AuthController::class, 'register'])->name('do.register');
    Route::post('/login', [AuthController::class, 'login'])->name('do.login');
});


Route::get('/user/check-username/{username}', [AuthController::class, 'checkUsername'])->name('checkUsername');

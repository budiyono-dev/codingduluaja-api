<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('page.welcome');
});

Route::get('/home', function () {
    return 'this is home route';
});

Route::get('/navbar', function () {
    return view('navbar');
});

Route::get('/get-data', function () {
    return trans('validation.required', ['field' => 'first name', 's' => 'skdjbfksjd']);
});

Route::view('/login', 'page.login')->name('login');
Route::view('/register', 'page.register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'doLogin'])->name('doLogin');
Route::get('/user/check-username/{username}', [AuthController::class, 'checkUsername'])->name('checkUsername');

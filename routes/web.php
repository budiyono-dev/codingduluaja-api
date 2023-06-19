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
    return 'ini data yang di return';
});

Route::view('/login', 'page.login');
Route::view('/register', 'page.register');
Route::post('/register', [AuthController::class, 'register']);
<?php

use Illuminate\Support\Facades\Route;

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
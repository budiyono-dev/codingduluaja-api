<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

require __DIR__.'/api/todolist.php';
require __DIR__.'/api/wilayah.php';
require __DIR__.'/api/user.php';

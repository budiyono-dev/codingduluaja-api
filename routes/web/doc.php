<?php

use App\Http\Controllers\DocController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', 'verified', 'menuAccess'],
    'controller' => DocController::class,
    'prefix' => '/app/doc',
], function () {
    Route::get('/todolist', 'todolist')->name('page.doc.todolist');
    Route::get('/wilayah/bps', 'wilayahBps')->name('page.doc.wilayahBps');
    Route::get('/wilayah/dagri', 'wilayahDagri')->name('page.doc.wilayahDagri');
    Route::get('/user', 'userApi')->name('page.doc.userApi');
});

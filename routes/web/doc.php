<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', 'verified', 'menuAccess'],
    'prefix' => '/app/doc',
], function () {
    Route::view('/todolist', 'page.doc.todolist')->name('doc.todolist');
    Route::view('/wilayah/bps', 'page.doc.wilayah-bps')->name('doc.wilayahBps');
    Route::view('/wilayah/dagri', 'page.doc.wilayah-dagri')->name('doc.wilayahDagri');
    Route::view('/user', 'page.doc.user-api')->name('doc.userApi');
});

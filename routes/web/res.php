<?php

use App\Http\Controllers\Api\ToDoListController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\WilayahController;
use App\Http\Controllers\DocController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', 'verified', 'menuAccess'],
    'controller' => DocController::class,
    'prefix' => '/app/res',
], function () {
    Route::controller(ToDoListController::class)->group(function () {
        Route::get('/todolist', 'todolist')->name('res.todolist');
        Route::post('/todolist/dummy', 'generateDummy')->name('todolist.dummy');
    });
    Route::controller(WilayahController::class)->group(function () {
        Route::get('/wilayah/bps', 'indexBps')->name('res.wilayahBps');
        Route::get('/wilayah/dagri', 'indexDagri')->name('res.wilayahDagri');
        Route::get('/wilayah/bps/{wilayah}/{id}', 'findBps')->name('res.findBps');
        Route::get('/wilayah/dagri/{wilayah}/{id}', 'findDagri')->name('res.findDagri');
    });
    Route::controller(UserApiController::class)->group(function () {
        Route::get('/user', 'index')->name('res.userApi');
        Route::post('/user/dummy', 'dummy')->name('userApi.dummy');
    });
});

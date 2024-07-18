<?php

use App\Http\Controllers\Api\ToDoListController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\WilayahController;
use App\Http\Controllers\DocController;
use Illuminate\Support\Facades\Route;

Route::group([
    'mideleware' => ['auth', 'verified', 'menu-access'],
    'controller' => DocController::class,
    'prefix' => '/app/res',
], function () {
    Route::controller(ToDoListController::class)->group(function () {
        Route::get('/todolist', 'todolist')->name('page.res.todolist');
        Route::post('/todolist/dummy', 'generateDummy')->name('do.todolist.dummy');
    });
    Route::controller(WilayahController::class)->group(function () {
        Route::get('/wilayah/bps', 'indexBps')->name('page.res.wilayahBps');
        Route::get('/wilayah/dagri', 'indexDagri')->name('page.res.wilayahDagri');
        Route::get('/wilayah/bps/{wilayah}/{id}', 'findBps')->name('page.res.findBps');
        Route::get('/wilayah/dagri/{wilayah}/{id}', 'findDagri')->name('page.res.findDagri');
    });
    Route::controller(UserApiController::class)->group(function () {
        Route::get('/user', 'index')->name('page.res.userApi');
        Route::post('/user/dummy', 'dummy')->name('do.userApi.dummy');
    });
});

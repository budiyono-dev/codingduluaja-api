<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ToDoListController;
use App\Constants\ApiPath;
use App\Http\Controllers\Api\WilayahController;

Route::get('/testing', function (Request $req) {
    return ['haklsuhkasdh' => 'kajshkdjsbakdb'];
});


Route::middleware(['req', 'token'])->group(function () {
    Route::controller(ToDoListController::class)->group(function () {
        Route::prefix(ApiPath::TODOLIST)->group(function () {
            Route::post('', 'createTodoList');
            Route::get('', 'getTodoList');
            Route::get('/{id}', 'getDetail');
            Route::put('/{id}', 'editTodolist');
            Route::delete('/{id}', 'deleteTodoList');
        });
    });
    Route::controller(WilayahController::class)->group(function () {
        Route::prefix(ApiPath::WILAYAH_BPS)->group(function () {
            Route::get('/provinsi', 'getListProvinsiBps');
            Route::get('/provinsi/{id}', 'getProvinsiBps');
            Route::get('/kabupaten', 'getListKabupatenBps');
            Route::get('/kabupaten/{id}', 'getKabupatenBps');
            Route::get('/kecamatan', 'getListKecamatanBps');
            Route::get('/kecamatan/{id}', 'getKecamatanBps');
            Route::get('/desa', 'getListDesaBps');
            Route::get('/desa/{id}', 'getDesaBps');
        });
        Route::prefix(ApiPath::WILAYAH_DAGRI)->group(function () {
            Route::get('/provinsi', 'getListProvinsiDargi');
            Route::get('/provinsi/{id}', 'getProvinsiDargi');
            Route::get('/kabupaten', 'getListKabupatenDargi');
            Route::get('/kabupaten/{id}', 'getKabupatenDargi');
            Route::get('/kecamatan', 'getListKecamatanDargi');
            Route::get('/kecamatan/{id}', 'getKecamatanDargi');
            Route::get('/desa', 'getListDesaDargi');
            Route::get('/desa/{id}', 'getDesaDargi');
        });
    });
});

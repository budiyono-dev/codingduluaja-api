<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ToDoListController;
use App\Constants\ApiPath;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\WilayahControllerApi;

Route::get('/testing', function () {
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

    Route::controller(WilayahControllerApi::class)->group(function () {
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
            Route::get('/provinsi', 'getListProvinsiDagri');
            Route::get('/provinsi/{id}', 'getProvinsiDagri');
            Route::get('/kabupaten', 'getListKabupatenDagri');
            Route::get('/kabupaten/{id}', 'getKabupatenDagri');
            Route::get('/kecamatan', 'getListKecamatanDagri');
            Route::get('/kecamatan/{id}', 'getKecamatanDagri');
            Route::get('/desa', 'getListDesaDagri');
            Route::get('/desa/{id}', 'getDesaDagri');
        });
    });

    Route::controller(UserApiController::class)->group(function(){
        Route::prefix(ApiPath::USER_API)->group(function(){
            Route::get('', 'get');
            Route::post('', 'create');
            Route::get('/{id}', 'detail');
            Route::put('/{id}', 'edit');
            Route::delete('/{id}', 'delete');
            Route::get('/image/{id}', 'getImage');
            Route::get('/image/{id}', 'updateImage');
        });
    });
});

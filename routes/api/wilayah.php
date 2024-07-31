<?php

use App\Constants\ApiPath;
use App\Http\Controllers\Api\WilayahApiController;
use Illuminate\Support\Facades\Route;

/**
 * Api Wilayah Bps Route
 */
Route::group([
    'middleware' => ['info', 'authToken'],
    'controller' => WilayahApiController::class,
    'prefix' => ApiPath::WILAYAH_BPS,
], function () {
    Route::get('/provinsi', 'getListProvinsiBps');
    Route::get('/provinsi/{id}', 'getProvinsiBps');
    Route::get('/kabupaten', 'getListKabupatenBps');
    Route::get('/kabupaten/{id}', 'getKabupatenBps');
    Route::get('/kecamatan', 'getListKecamatanBps');
    Route::get('/kecamatan/{id}', 'getKecamatanBps');
    Route::get('/desa', 'getListDesaBps');
    Route::get('/desa/{id}', 'getDesaBps');
});

/**
 * Api Wilayah Dagri Route
 */
Route::group([
    'middleware' => ['info', 'authToken'],
    'controller' => WilayahApiController::class,
    'prefix' => ApiPath::WILAYAH_DAGRI,
], function () {
    Route::get('/provinsi', 'getListProvinsiDagri');
    Route::get('/provinsi/{id}', 'getProvinsiDagri');
    Route::get('/kabupaten', 'getListKabupatenDagri');
    Route::get('/kabupaten/{id}', 'getKabupatenDagri');
    Route::get('/kecamatan', 'getListKecamatanDagri');
    Route::get('/kecamatan/{id}', 'getKecamatanDagri');
    Route::get('/desa', 'getListDesaDagri');
    Route::get('/desa/{id}', 'getDesaDagri');
});

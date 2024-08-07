<?php

use App\Constants\ApiPath;
use App\Http\Controllers\Api\UserApiController;
use Illuminate\Support\Facades\Route;

/**
 * Api Todolist Route
 */
Route::group([
    'middleware' => ['info', 'authToken'],
    'controller' => UserApiController::class,
    'prefix' => ApiPath::USER_API,
], function () {
    Route::get('', 'get');
    Route::post('', 'create');
    Route::get('/{id}', 'detail');
    Route::put('/{id}', 'edit');
    Route::delete('/{id}', 'delete');
    Route::get('/image/{id}', 'getImage');
    Route::post('/image/{id}', 'updateImage');
});

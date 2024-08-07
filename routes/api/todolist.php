<?php

use App\Constants\ApiPath;
use App\Http\Controllers\Api\ToDoListController;
use Illuminate\Support\Facades\Route;

/**
 * Api Todolist Route
 */
Route::group([
    'middleware' => ['info', 'authToken'],
    'controller' => ToDoListController::class,
    'prefix' => ApiPath::TODOLIST,
], function () {
    Route::post('', 'createTodoList');
    Route::get('', 'getTodoList');
    Route::get('/{id}', 'getDetail');
    Route::put('/{id}', 'editTodolist');
    Route::delete('/{id}', 'deleteTodoList');
});

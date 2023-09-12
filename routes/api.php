<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ToDoListController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/testing', function (Request $req) {
    return ['haklsuhkasdh' => 'kajshkdjsbakdb'];
});

Route::post('todo-list', [ToDoListController::class, 'createTodoList']);
Route::get('todo-list', [ToDoListController::class, 'getTodoList']);
Route::get('todo-list/{id}', [ToDoListController::class, 'getDetail']);
Route::put('todo-list/{id}', [ToDoListController::class, 'editTodolist']);
Route::delete('todo-list/{id}', [ToDoListController::class, 'deleteTodoList']);

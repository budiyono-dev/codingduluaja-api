<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ToDoListController;

Route::get('/testing', function (Request $req) {
    return ['haklsuhkasdh' => 'kajshkdjsbakdb'];
});


Route::middleware(['req','token'])->group(function(){
    Route::controller(ToDoListController::class)->group(function(){
        Route::prefix('todo-list')->group(function() {
                Route::post('', 'createTodoList');
                Route::get('', 'getTodoList');
                Route::get('/{id}', 'getDetail');
                Route::put('/{id}', 'editTodolist');
                Route::delete('/{id}', 'deleteTodoList');    
        });
    });
});

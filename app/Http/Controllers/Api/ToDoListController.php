<?php

namespace App\Http\Controllers\Api;

use App\Constants\ResponseCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateTodolistRequest;
use App\Http\Requests\Api\EditTodolistRequest;
use App\Services\Api\TodolistService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ToDoListController extends Controller
{
    public function __construct(protected TodolistService $todolistService) {}

    public function createTodoList(CreateTodolistRequest $request): JsonResponse
    {
        Log::info('[todolist.API] Create Todolist');
        $req = $request->validated();
        $todo = $this->todolistService->create($this->apiUserId(), $req['date'], $req['name'], $req['description']);

        return $this->apiSuccess('Data Inserted Successfully', ResponseCode::SUCCESS_CREATE_DATA, $todo);
    }

    public function getTodoList(): JsonResponse
    {
        Log::info('[todolist.API] get all todolist');

        return $this->apiSuccess(
            'Successfully Get Todolist',
            ResponseCode::SUCCESS_GET_DATA,
            $this->todolistService->getTodoList($this->apiUserId()),
        );
    }

    public function getDetail(int $id): JsonResponse
    {
        Log::info('[todolist.API] get detail');

        return $this->apiSuccess(
            'Successfully Get Todolist',
            ResponseCode::SUCCESS_GET_DATA,
            $this->todolistService->detail($this->apiUserId(), $id)
        );
    }

    public function editTodoList(int $id, EditTodolistRequest $req): JsonResponse
    {
        Log::info('[todolist.API] edit Todolist');

        return $this->apiSuccess(
            'Data Updated Successfully',
            ResponseCode::SUCCESS_EDIT_DATA,
            $this->todolistService->edit($this->apiUserId(), $id, $req['date'], $req['name'], $req['description'])
        );
    }

    public function deleteTodoList($id)
    {
        Log::info('[todolist.API] delete Todolist');

        return $this->apiSuccess('Data Deleted Successfully', ResponseCode::SUCCESS_DELETE_DATA,
            $this->todolistService->delete($this->apiUserId(), $id));
    }
}

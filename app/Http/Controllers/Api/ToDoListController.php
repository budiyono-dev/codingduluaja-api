<?php

namespace App\Http\Controllers\Api;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateTodolistRequest;
use App\Models\Api\Todolist;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ToDoListController extends Controller
{
    public function __construct
    (
        public ResponseHelper $responseHelper
    )
    {
    }

    public function createTodoList(CreateTodolistRequest $req): JsonResponse
    {
        Log::info('Create Todolist');
        DB::transaction(function () use ($req) {
            $validatedReq = $req->validated();
            $todo = new Todolist();
            $todo->date = Carbon::createFromFormat('d-m-Y', $validatedReq['date'])->format('Y-m-d');
            $todo->name = $validatedReq['name'];
            $todo->save();
            Log::info($todo);
        });
        return $this->responseHelper->successResponse('Data Inserted Successfully', null);
    }

    public function getTodoList(): JsonResponse
    {
        return $this->responseHelper->successResponse('Successfully Get Todolist', Todolist::all());
    }

    public function getDetail(int $id): JsonResponse
    {
        return $this->responseHelper->successResponse('Successfully Get Todolist', Todolist::findOrFail($id));
    }

    public function editTodoList(int $id, CreateTodolistRequest $req): JsonResponse
    {
        Log::info("edit Todolist : {$id}");
        DB::transaction(function () use ($id, $req) {
            $todo = Todolist::findOrFail($id);

            $validatedReq = $req->validated();

            $todo->date = Carbon::createFromFormat('d-m-Y', $validatedReq['date'])->format('Y-m-d');
            $todo->name = $validatedReq['name'];
            $todo->save();
        });
        return $this->responseHelper->successResponse('Data Updated Successfully', null);
    }

    public function deleteTodoList($id)
    {
        Log::info("delete Todolist : {$id}");
        DB::transaction(function () use ($id) {
            Todolist::findOrFail($id)->delete();
        });
        return $this->responseHelper->successResponse('Data Deleted Successfully', null);
    }
}

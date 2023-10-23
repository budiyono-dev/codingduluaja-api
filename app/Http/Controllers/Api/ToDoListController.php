<?php

namespace App\Http\Controllers\Api;

use App\Constants\ResponseCode;
use App\Exceptions\TokenException;
use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateTodolistRequest;
use App\Models\Api\Todolist;
use App\Traits\ApiContext;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ToDoListController extends Controller
{
    use ApiContext;

    public function __construct
    (
        protected ResponseHelper $responseHelper
    )
    {
    }

    public function createTodoList(CreateTodolistRequest $req): JsonResponse
    {
        Log::info("Create Todolist = {$this->getRequestId()}");
        DB::transaction(function () use ($req) {
            $validatedReq = $req->validated();
            Todolist::create([
                'user_id' => $this->getUserId(),
                'date' => Carbon::createFromFormat('d-m-Y', $validatedReq['date'])->format('Y-m-d'),
                'name' => $validatedReq['name'],
                'description' => $validatedReq['description']
            ]);
        });
        return $this->successResponse(
            'Data Inserted Successfully',
            ResponseCode::SUCCESS_GET_DATA,
            null
        );
    }

    public function getTodoList(): JsonResponse
    {
        Log::info("get all todolist = {$this->getRequestId()}");
        return $this->successResponse(
            'Successfully Get Todolist',
            ResponseCode::SUCCESS_GET_DATA,
            Todolist::where('user_id', $this->getUserId())
        );
    }

    public function getDetail(int $id): JsonResponse
    {
        Log::info("get detail = {$this->getRequestId()}");
        return $this->successResponse(
            'Successfully Get Todolist',
            ResponseCode::SUCCESS_GET_DATA,
            Todolist::findOrFail($id)
        );
    }

    public function editTodoList(int $id, CreateTodolistRequest $req): JsonResponse
    {
        Log::info("edit Todolist = {$this->getRequestId()}");
        DB::transaction(function () use ($id, $req) {
            $todo = Todolist::findOrFail($id);

            $validatedReq = $req->validated();

            $todo->date = Carbon::createFromFormat('d-m-Y', $validatedReq['date'])->format('Y-m-d');
            $todo->name = $validatedReq['name'];
            $todo->description = $validatedReq['description'];
            $todo->save();
        });
        return $this->successResponse(
            'Data Updated Successfully',
            ResponseCode::SUCCESS_EDIT_DATA,
            null
        );
    }

    public function deleteTodoList($id)
    {
        Log::info("delete Todolist = {$this->getRequestId()}");
        DB::transaction(function () use ($id) {
            // Todolist::findOrFail($id)->delete();
            Todolist::findOr($id, function () {
                throw new TokenException('asdasdfasd');
            });
        });
        return $this->successResponse(
            'Data Deleted Successfully',
            ResponseCode::SUCCESS_DELETE_DATA,
            null
        );
    }

    private function successResponse(string $msg, string $responseCode, $data): JsonResponse
    {
        return $this->responseHelper->success(
            $this->getRequestId(),
            $msg,
            $responseCode,
            $data
        );
    }
}

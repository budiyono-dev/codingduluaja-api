<?php

namespace App\Http\Controllers\Api;

use App\Constants\CdaContext;
use App\Constants\ResponseCode;
use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateTodolistRequest;
use App\Models\Api\Todolist;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Exceptions\TokenException;

class ToDoListController extends Controller
{
    public function __construct
    (
        protected ResponseHelper $responseHelper
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
        return $this->successResponse(
                'Data Inserted Successfully',
                ResponseCode::SUCCESS_GET_DATA,
                null
            );
    }

    public function getTodoList(): JsonResponse
    {
        return $this->successResponse(
                'Successfully Get Todolist',
                ResponseCode::SUCCESS_GET_DATA,
                Todolist::all()
            );
    }

    public function getDetail(int $id): JsonResponse
    {
        return $this->successResponse(
                'Successfully Get Todolist',
                ResponseCode::SUCCESS_GET_DATA,
                Todolist::findOrFail($id)
            );
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
        return $this->successResponse(
                'Data Updated Successfully',
                ResponseCode::SUCCESS_EDIT_DATA,
                null
            );
    }

    public function deleteTodoList($id)
    {
        Log::info("delete Todolist : {$id}");
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

    private function getContext(): array
    {
        return request()->attributes->get(CdaContext::REQUEST_CTX);
    }

    private function successResponse(string $msg, string $responseCode, $data): JsonResponse
    {
        return $this->responseHelper->success(
            $this->getContext()['request_id'],
            $msg,
            $responseCode,
            $data
        );
    }
}

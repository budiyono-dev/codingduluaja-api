<?php

namespace App\Http\Controllers\Api;

use App\Constants\Context;
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

    private function getContext() : array 
    {
        return request()->attributes->get(Context::REQUEST_CTX);
    }

    public function createTodoList(CreateTodolistRequest $req): JsonResponse
    {
        $reqId = $this->getContext()->request_id;
        Log::info('Create Todolist');
        DB::transaction(function () use ($req) {
            $validatedReq = $req->validated();
            $todo = new Todolist();
            $todo->date = Carbon::createFromFormat('d-m-Y', $validatedReq['date'])->format('Y-m-d');
            $todo->name = $validatedReq['name'];
            $todo->save();
            Log::info($todo);
        });
        return $this->responseHelper->success('Data Inserted Successfully', null);
    }

    public function getTodoList(): JsonResponse
    {
        $reqId = $this->getContext()['request_id'];
        return $this->responseHelper->success($reqId, 'OK', ResponseCode::SUCCESS_GET_DATA, Todolist::all());
        return $this->responseHelper->success('Successfully Get Todolist', Todolist::all());
    }

    public function getDetail(int $id): JsonResponse
    {
        return $this->responseHelper->success('Successfully Get Todolist', Todolist::findOrFail($id));
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
        return $this->responseHelper->success('Data Updated Successfully', null);
    }

    public function deleteTodoList($id)
    {
        Log::info("delete Todolist : {$id}");
        DB::transaction(function () use ($id) {
            // Todolist::findOrFail($id)->delete();
            Todolist::findOr($id, function(){
                throw new TokenException('asdasdfasd');
            });
        });
        return $this->responseHelper->success('Data Deleted Successfully', null);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Constants\ResponseCode;
use App\Enums\MasterResourceType;
use App\Exceptions\ApiException;
use App\Helper\ResponseBuilder;
use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateTodolistRequest;
use App\Http\Requests\Api\DummyTodolistRequest;
use App\Http\Requests\Api\EditTodolistRequest;
use App\Models\Api\Todolist;
use App\Services\Api\TodolistService;
use App\Traits\ApiContext;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ToDoListController extends Controller
{
    public function __construct(protected TodolistService $todolistService) {}

    public function createTodoList(CreateTodolistRequest $request): JsonResponse
    {
        Log::info('[TODOLIST-API] Create Todolist');
        $req = $request->validated();
        $this->todolistService->create($this->apiUserId(), $req);
        
        return ResponseBuilder::success(
            $this->apiReqId(),
            'Data Inserted Successfully',
            ResponseCode::SUCCESS_CREATE_DATA,
            null
        );
    }

    public function getTodoList(): JsonResponse
    {
        Log::info('[TODOLIST-API] get all todolist');

        return ResponseBuilder::success(
            $this->apiReqId(),
            'Successfully Get Todolist',
            ResponseCode::SUCCESS_GET_DATA,
            $this->todolistService->getTodoList($this->apiUserId()),
        );
    }

    public function getDetail(int $id): JsonResponse
    {
        Log::info("[TODOLIST-API] get detail");

        return ResponseBuilder::success(
            $this->apiReqId(),
            'Successfully Get Todolist',
            ResponseCode::SUCCESS_GET_DATA,
            Todolist::findOrFail($id)
        );
    }

    public function editTodoList(int $id, EditTodolistRequest $req): JsonResponse
    {
        Log::info("[TODOLIST-API] edit Todolist = {$this->getRequestId()}");
        DB::transaction(function () use ($id, $req) {
            $todo = Todolist::findOrFail($id);
            $validatedReq = $req->validated();

            // validate tanggal edit jika sudah terlewat tidak boleh di edit
            $dateDb = Carbon::createFromFormat('Y-m-d', $todo->date);
            $dateReq = Carbon::createFromFormat('d-m-Y', $validatedReq['date']);
            if ($dateDb->isPast() && $dateDb->notEqualTo($dateReq)) {
                throw ApiException::forbidden('you are not allowed to change past data todolist date');
            }

            $todo->date = $dateReq->format('Y-m-d');
            $todo->name = $validatedReq['name'];
            $todo->description = $validatedReq['description'];
            $todo->save();
        });

        return ResponseBuilder::success(
            $this->apiReqId(),
            'Data Updated Successfully',
            ResponseCode::SUCCESS_EDIT_DATA,
            null
        );
    }

    public function deleteTodoList($id)
    {
        Log::info("[TODOLIST-API] delete Todolist = {$this->getRequestId()}");
        DB::transaction(function () use ($id) {
            $todolist = Todolist::findOr($id, function () {
                throw ApiException::notFound();
            });
            $todolist->delete();
        });

        return ResponseBuilder::success(
            $this->apiReqId(),
            'Data Deleted Successfully',
            ResponseCode::SUCCESS_DELETE_DATA,
            null
        );
    }
}

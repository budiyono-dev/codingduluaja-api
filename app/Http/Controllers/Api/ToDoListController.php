<?php

namespace App\Http\Controllers\Api;

use App\Constants\ResponseCode;
use App\Dto\TodolistDto;
use App\Exceptions\ApiException;
use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateTodolistRequest;
use App\Http\Requests\Api\DummyTodolistRequest;
use App\Models\Api\Todolist;
use App\Traits\ApiContext;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function App\Exceptions\ApiException;

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
        return $this->responseHelper->success(
            $this->getRequestId(),
            'Data Inserted Successfully',
            ResponseCode::SUCCESS_GET_DATA,
            null
        );
    }

    public function getTodoList(): JsonResponse
    {
        Log::info("get all todolist = {$this->getRequestId()}");
        $data = Todolist::where('user_id', $this->getUserId())->get()->map(function (Todolist $t) {
            return TodolistDto::fromTodolist($t);
        });

        return $this->responseHelper->success(
            $this->getRequestId(),
            'Successfully Get Todolist',
            ResponseCode::SUCCESS_GET_DATA,
            $data
        );
    }

    public function getDetail(int $id): JsonResponse
    {
        Log::info("get detail = {$this->getRequestId()}");
        return $this->responseHelper->success(
            $this->getRequestId(),
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
        return $this->responseHelper->success(
            $this->getRequestId(),
            'Data Updated Successfully',
            ResponseCode::SUCCESS_EDIT_DATA,
            null
        );
    }

    public function deleteTodoList($id)
    {
        Log::info("delete Todolist = {$this->getRequestId()}");
        DB::transaction(function () use ($id) {
            $todolist = Todolist::findOr($id, function () {
                throw ApiException::notFound();
            });
            $todolist->delete();
        });
        return $this->responseHelper->success(
            $this->getRequestId(),
            'Data Deleted Successfully',
            ResponseCode::SUCCESS_DELETE_DATA,
            null
        );
    }

    public function generateDummy(DummyTodolistRequest $req)
    {
        DB::transaction(function () use ($req) {
            $userId = Auth::user()->id;
            $validatedReq = $req->validated();
            $qty = $validatedReq['sel_qty'];
            Log::info("create dummy data todolist for {$userId} qty : {$qty}");
            $faker = Factory::create();
            for ($i = 0; $i < $qty; $i++) {
                $date = 
                Todolist::create([
                    'user_id' => $this->getUserId(),
                    'date' => Carbon::createFromFormat('d - m - Y', $validatedReq['date'])->format('Y - m - d'),
                    'name' => $faker->sentences(3),
                    'description' => $faker->sentences(5)
                ]);
            }
        });
        return redirect()->route('page.res.todolist');
    }

    public function todolist()
    {
        $todolist = Todolist::where('user_id', Auth::user()->id)->get();
//        dd($todolist);
        return view('page.res.todolist', ['todolist' => $todolist]);
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

<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DummyTodolistRequest;
use App\Services\Api\TodolistService;

class ResourceManagerController extends Controller
{
    public function __construct(
        protected TodolistService $todolistService
    ) {}

    public function todolist()
    {

        return view('page.res.todolist',
            [
                'todolist' => $this->todolistService->getTodolistView($this->authUserId()),
            ]);
    }

    public function todolistDummy(DummyTodolistRequest $request)
    {
        $req = $request->validated();
        $this->todolistService->generateDummy($this->authUserId(), $req['sel_qty']);

        return redirect()->route('res.todolist');
    }

    public function pageDummy()
    {
        return view('page.res.todolist-dummy');
    }
}

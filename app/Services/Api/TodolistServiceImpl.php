<?php

namespace App\Services\Api;

use App\Dto\TodolistDto;
use App\Exceptions\ApiException;
use App\Models\Api\Todolist;
use Carbon\Carbon;
use Faker\Factory;

class TodolistServiceImpl implements TodolistService
{
    public function __construct()
    {
        //
    }

    public function getTodolist(int $userId)
    {
        return Todolist::where('user_id', $userId)
            ->get()
            ->map(fn ($t) => TodolistDto::fromTodolist($t));
    }

    public function getTodolistView(int $userId)
    {
        return Todolist::where('user_id', $userId)
            ->get();
    }

    public function create(int $userId, string $date, string $name, string $description)
    {
        $todo = Todolist::create([
            'user_id' => $userId,
            'date' => Carbon::createFromFormat('Y-m-d', $date),
            'name' => $name,
            'description' => $description,
        ]);

        return TodolistDto::fromTodolist($todo);
    }

    public function generateDummy(int $userId, int $qty)
    {
        $faker = Factory::create('id_ID');
        $now = Carbon::now();
        $end = $now->copy()->addDays(14);
        $list = [];
        for ($i = 0; $i < $qty; $i++) {
            $list[] = [
                'user_id' => $userId,
                'date' => $faker->dateTimeBetween($now, $end)->format('Y-m-d'),
                'name' => $faker->sentence(3),
                'description' => $faker->sentence(10),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        Todolist::insert($list);
    }

    public function detail(int $userId, $id)
    {
        return TodolistDto::fromTodolist($this->findTodolist($userId, $id));
    }

    public function edit(int $userId, int $id, string $date, string $name, string $description)
    {
        $todo = $this->findTodolist($userId, $id);

        // validate tanggal edit jika sudah terlewat tidak boleh di edit
        $dateDb = Carbon::createFromFormat('Y-m-d', $todo->date);
        $dateReq = Carbon::createFromFormat('Y-m-d', $date);
		
        if (floor($dateDb->diffInDays($dateReq)) < 0) {
            throw ApiException::forbidden('you are not allowed to change past data todolist date');
        }

        $todo->date = $dateReq->format('Y-m-d');
        $todo->name = $name;
        $todo->description = $description;
        $todo->save();

        return TodolistDto::fromTodolist($todo);
    }

    public function delete(int $userId, $id)
    {
        $todolist = $this->findTodolist($userId, $id);
        $todolist->delete();
    }

    private function findTodolist(int $userId, int $id)
    {
        $todolist = Todolist::where('id', $id)->where('user_id', $userId)->first();

        if (is_null($todolist)) {
            throw ApiException::notFound();
        }

        return $todolist;
    }
}

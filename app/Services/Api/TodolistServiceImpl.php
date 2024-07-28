<?php

namespace App\Services\Api;

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
}

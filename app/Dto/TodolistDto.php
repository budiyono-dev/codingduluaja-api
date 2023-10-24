<?php

namespace App\Dto;

use App\Models\Api\Todolist;

class TodolistDto
{

    public function __construct(
        public string $id,
        public string $date,
        public string $name,
        public string $description,
        public string $created_at,
        public string $updated_at
    )
    {
    }

    public static function fromTodolist(Todolist $todo)
    {
        return new TodolistDto(
            $todo->id,
            $todo->date,
            $todo->name,
            $todo->description,
            $todo->created_at,
            $todo->updated_at);
    }
}

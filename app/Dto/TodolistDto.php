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
        public string $createdAt,
        public string $updatedAt
    ) {}

    public static function fromTodolist(Todolist $todo)
    {
        $dto = new TodolistDto(
            $todo->id,
            $todo->date,
            $todo->name,
            $todo->description,
            $todo->created_at,
            $todo->updated_at
        );

        return $dto->toJSON();
    }

    public function toJSON()
    {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'name' => $this->name,
            'description' => $this->description,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }
}

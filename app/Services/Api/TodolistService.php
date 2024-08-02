<?php

namespace App\Services\Api;

interface TodolistService
{
    public function getTodolist(int $userId);

    public function getTodolistView(int $userId);

    public function generateDummy(int $userId, int $qty);

    public function create(int $userId, string $date, string $name, string $description);

    public function edit(int $userId, int $id, string $date, string $name, string $description);

    public function detail(int $userId, int $id);

    public function delete(int $userId, int $id);
}

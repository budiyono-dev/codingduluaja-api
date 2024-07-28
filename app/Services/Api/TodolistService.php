<?php

namespace App\Services\Api;

interface TodolistService
{
    public function getTodolist(int $userId);

    public function getTodolistView(int $userId);

    public function generateDummy(int $userId, int $qty);
}

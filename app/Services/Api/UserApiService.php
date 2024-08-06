<?php

namespace App\Services\Api;

interface UserApiService
{
    public function getView(int $userId);

    public function dummy(int $userId, int $qty);

    public function get(int $userId, array $params);

    public function create(int $userId, array $req);

    public function getImage(int $userId, string $id);

    public function updateImage(int $userId, string $id, $file);

    public function detail(int $userId, string $id);

    public function detailView(int $userId, string $id);

    public function edit(int $userId, int $id, $rv);

    public function delete(int $userId, string $id);
}

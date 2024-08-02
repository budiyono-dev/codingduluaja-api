<?php

namespace Tests\Feature\Api;

use App\Services\Application\AppClientService;
use App\Services\Application\AppClientServiceImpl;
use App\Services\Application\AppManagerService;
use App\Services\Application\AppManagerServiceImpl;
use App\Services\Application\AppResourceService;
use App\Services\Application\AppResourceServiceImpl;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TodolistTest extends TestCase
{
    use RefreshDatabase;

    protected string $token = '';

    protected function setUp(): void
    {
        parent::setUp();
        $userId = 2;
        $expId = 1;
        $this->app->singleton(AppClientService::class, AppClientServiceImpl::class);
        $this->app->singleton(AppResourceService::class, AppResourceServiceImpl::class);
        $this->app->singleton(AppManagerService::class, AppManagerServiceImpl::class);

        $appClientService = $this->app->make(AppClientService::class);
        $appResourceService = $this->app->make(AppResourceService::class);
        $appManagerService = $this->app->make(AppManagerService::class);

        $appClient = $appClientService->createAppClient($userId, 'todoclient', 'testing client todolist');
        $appResource = $appResourceService->addResource($userId, 1);
        $this->token = $appManagerService->createToken($userId, $appResource->id, $appClient->id, $expId);
    }

    public function testCreateTodolist(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->token,
        ])->post('/api/todolist', [
            'date' => '24-12-2023',
            'name' => 'watching footbal',
            'description' => 'MU VS Liverpol',
        ]);

        $response->dump();
        $response->assertOk();

    }
}

<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WilayahTest extends TestCase
{
    use RefreshDatabase;

    private static $tokenWilayah = null;

    protected function setUp(\App\Services\Application\AppClientService $appClientService): void
    {
        parent::setUp();
       $userId = 2;
       $appClientService = $this->app->singleton(\App\Services\Application\AppClientService::class, \App\Services\Application\AppClientServiceImpl::class);
       $appResourceService = $this->app->singleton(\App\Services\Application\AppResourceService::class, \App\Services\Application\AppResourceServiceImpl::class);
       $appManagerService = $this->app->singleton(\App\Services\Application\AppManagerService::class, \App\Services\Application\AppManagerServiceImpl::class);


       $appClientService = $this->app->make();
       $appResourceService = $this->app->singleton();
       $appManagerService = $this->app->singleton();

      $appClient = $appClientService->createAppClient(2, 'testing client', 'testing client desc');
       $appResource = $appResourceService->addResource($userId, 2);
       $token = $appManagerService->createToken($userId, $appResource->id, $appClient->id, 1);

        echo $token;
    }

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/api/todolist');

    }
}

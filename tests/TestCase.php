<?php

namespace Tests;

use App\Services\Application\AppClientService;
use App\Services\Application\AppClientServiceImpl;
use App\Services\Application\AppManagerService;
use App\Services\Application\AppManagerServiceImpl;
use App\Services\Application\AppResourceService;
use App\Services\Application\AppResourceServiceImpl;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function createResourceToken(int $resource)
    {
        $userId = 2;
        $exp = 1;

        $this->app->singleton(AppClientService::class, AppClientServiceImpl::class);
        $this->app->singleton(AppResourceService::class, AppResourceServiceImpl::class);
        $this->app->singleton(AppManagerService::class, AppManagerServiceImpl::class);

        $appClientService = $this->app->make(AppClientService::class);
        $appResourceService = $this->app->make(AppResourceService::class);
        $appManagerService = $this->app->make(AppManagerService::class);

        $appClient = $appClientService->createAppClient($userId, 'testing client', 'testing client desc');
        $appResource = $appResourceService->addResource($userId, $resource);
        $token = $appManagerService->createToken($userId, $appResource->id, $appClient->id, $exp);

        return $token;
    }
}

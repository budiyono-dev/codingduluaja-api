<?php

namespace App\Providers;

use App\Helper\ArtisanHelper;
use App\Helper\ImagePlaceholder;
use App\Helper\ResponseHelper;
use App\Repository\Impl\MenuRepositoryImpl;
use App\Repository\Impl\ResourceRepositoryImpl;
use App\Repository\Impl\TokenRepositoryImpl;
use App\Repository\Impl\UserRepositoryImpl;
use App\Repository\MenuRepository;
use App\Repository\ResourceRepository;
use App\Repository\TokenRepository;
use App\Repository\UserRepository;
use App\Services\Api\TodolistService;
use App\Services\Api\TodolistServiceImpl;
use App\Services\Application\AppClientService;
use App\Services\Application\AppClientServiceImpl;
use App\Services\Application\AppManagerService;
use App\Services\Application\AppManagerServiceImpl;
use App\Services\Application\AppResourceService;
use App\Services\Application\AppResourceServiceImpl;
use App\Services\Impl\MenuServiceImpl;
use App\Services\Impl\ResourceServiceImpl;
use App\Services\MenuService;
use App\Services\ResourceService;
use App\Services\Wilayah\Wilayah;
use App\Services\Wilayah\WilayahImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ResponseHelper::class);
        $this->app->singleton(ImagePlaceholder::class);
        $this->app->singleton(ResourceRepository::class, ResourceRepositoryImpl::class);
        $this->app->singleton(UserRepository::class, UserRepositoryImpl::class);
        $this->app->singleton(MenuRepository::class, MenuRepositoryImpl::class);
        $this->app->singleton(TokenRepository::class, TokenRepositoryImpl::class);
        $this->app->singleton(ArtisanHelper::class, ArtisanHelper::class);
        $this->app->singleton(AppClientService::class, AppClientServiceImpl::class);
        $this->app->singleton(AppResourceService::class, AppResourceServiceImpl::class);
        $this->app->singleton(Wilayah::class, WilayahImpl::class);
        $this->app->singleton(ResourceService::class, ResourceServiceImpl::class);
        $this->app->singleton(MenuService::class, MenuServiceImpl::class);
        $this->app->singleton(AppManagerService::class, AppManagerServiceImpl::class);

        // api services
        $this->app->singleton(TodolistService::class, TodolistServiceImpl::class);
    }

    public function boot(): void
    {
        // not implement anything yet
    }
}

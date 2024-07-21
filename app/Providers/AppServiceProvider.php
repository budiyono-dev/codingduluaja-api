<?php

namespace App\Providers;

use App\Helper\ArtisanHelper;
use App\Helper\ImagePlaceholder;
use App\Helper\ResponseHelper;
use App\Repository\Impl\MenuRepositoryImpl;
use App\Repository\Impl\ResourceRepositoryImpl;
use App\Repository\Impl\UserRepositoryImpl;
use App\Repository\MenuRepository;
use App\Repository\ResourceRepository;
use App\Repository\UserRepository;
use App\Services\Application\AppClientService;
use App\Services\Application\AppClientServiceImpl;
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
        $this->app->singleton(ResponseHelper::class, function () {
            return new ResponseHelper();
        });

        $this->app->singleton(Wilayah::class, function () {
            return new WilayahImpl(
                $this->app->make(ResponseHelper::class)
            );
        });

        $this->app->singleton(ImagePlaceholder::class, function () {
            return new ImagePlaceholder();
        });

        $this->app->singleton(ResourceRepository::class, function () {
            return new ResourceRepositoryImpl();
        });

        $this->app->singleton(ResourceService::class, function () {
            return new ResourceServiceImpl(
                $this->app->make(ResourceRepository::class)
            );
        });

        $this->app->singleton(UserRepository::class, function () {
            return new UserRepositoryImpl();
        });

        $this->app->singleton(MenuRepository::class, function () {
            return new MenuRepositoryImpl();
        });

        $this->app->singleton(MenuService::class, function () {
            return new MenuServiceImpl(
                $this->app->make(MenuRepository::class),
                $this->app->make(UserRepository::class)
            );
        });

        $this->app->singleton(ArtisanHelper::class, function () {
            return new ArtisanHelper();
        });

        $this->app->singleton(AppClientService::class, function () {
            return new AppClientServiceImpl();
        });
    }

    public function boot(): void
    {
        // not implement anything yet
    }
}

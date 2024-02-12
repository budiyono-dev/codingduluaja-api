<?php

namespace App\Providers;

use App\Helper\ResponseHelper;
use App\Jwt\JwtHelper;
use App\Services\Wilayah\Wilayah;
use App\Services\Wilayah\WilayahImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ResponseHelper::class, function () {
            return new ResponseHelper();
        });

        $this->app->singleton(JwtHelper::class, function (){
            return new JwtHelper();
        });

        $this->app->singleton(Wilayah::class, function (){
            return new WilayahImpl(
                $this->app->make(ResponseHelper::class)
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Paginator::useBootstrap();
    }
}

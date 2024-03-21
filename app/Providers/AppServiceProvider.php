<?php

namespace App\Providers;

use App\Helper\ImagePlaceholder;
use App\Helper\ResponseHelper;
use App\Jwt\JwtHelper;
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

        $this->app->singleton(JwtHelper::class, function (){
            return new JwtHelper();
        });

        $this->app->singleton(Wilayah::class, function (){
            return new WilayahImpl(
                $this->app->make(ResponseHelper::class)
            );
        });

        $this->app->singleton(ImagePlaceholder::class, function(){
            return new ImagePlaceholder();
        });
    }

    public function boot(): void
    {
        // not required yet
    }
}

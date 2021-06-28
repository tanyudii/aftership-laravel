<?php

namespace Tanyudii\AfterShipLaravel;

use Illuminate\Support\ServiceProvider;
use Tanyudii\AfterShipLaravel\Services\AfterShipService;

class AfterShipLaravelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../config/aftership-laravel.php", "aftership-laravel");

        $this->app->bind("aftership-service", function () {
            return new AfterShipService;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes(
                [
                    __DIR__ . "/../config/aftership-laravel.php" => config_path(
                        "aftership-laravel.php"
                    ),
                ],
                "aftership-laravel-config"
            );
        }
    }
}

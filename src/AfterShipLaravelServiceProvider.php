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
        $this->app->alias('aftership-laravel', AfterShipService::class);
        $this->app->singleton('aftership-laravel', function () {
            return new AfterShipService;
        });

        $this->registerPublishing();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    private function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            // Lumen lacks a config_path() helper, so we use base_path()
            $this->publishes([
                __DIR__.'/../config/aftership-laravel.php' => base_path('config/aftership-laravel.php'),
            ], 'laravel-aftership-config');
        }
    }
}

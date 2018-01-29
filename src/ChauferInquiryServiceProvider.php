<?php

namespace Alexstorm13\ChauferInquiry;

use Illuminate\Support\ServiceProvider;

/**
 * Class MenuServiceProvider
 * @package Alexstorm13\Zauth
 */
class ChauferInquiryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $routeServiceProvider = new RouteServiceProvider(ServiceProvider::class);
        $routeServiceProvider->map();
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'ChauferInquiry');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}

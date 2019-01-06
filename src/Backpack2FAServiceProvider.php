<?php

namespace Laraviet\Backpack2FA;

use Illuminate\Support\ServiceProvider;
use Laraviet\Backpack2FA\Providers\RouteServiceProvider;

class Backpack2FAServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'backpack2fa');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        /*
        |--------------------------------------------------------------------------
        | Route Providers need on boot() method, others can be in register() method
        |--------------------------------------------------------------------------
         */
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['router']->aliasMiddleware('2fa', \PragmaRX\Google2FALaravel\Middleware::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['backpack2fa'];
    }
}

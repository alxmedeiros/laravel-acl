<?php

namespace Alxmedeiros\LaravelAcl;

use Illuminate\Support\ServiceProvider;

class AclServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/Views', 'acl');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../database/seeds/' => database_path('seeds')
        ], 'seeds');

        $this->publishes([
            __DIR__.'/Views' => base_path('resources/views/alxmedeiros/laravel-acl'),
        ], 'views');

    }
}

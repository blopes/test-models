<?php

namespace Blopes\SharedModels;

use Blopes\SharedModels\Middleware\Authenticate;
use Illuminate\Support\ServiceProvider;

class ProjectServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app('router')->aliasMiddleware('authenticate', Authenticate::class);
    }

    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}

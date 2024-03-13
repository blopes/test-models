<?php

namespace Blopes\SharedModels;

use Blopes\SharedModels\Middleware\Authenticate;
use Blopes\SharedModels\Middleware\CustomEmailVerification;
use Illuminate\Support\ServiceProvider;

class ProjectServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app('router')->aliasMiddleware('authenticate', Authenticate::class);
        app('router')->aliasMiddleware('verify_email', CustomEmailVerification::class);
    }

    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}

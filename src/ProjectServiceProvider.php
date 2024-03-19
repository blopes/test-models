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

    protected $seed_list = [
        'Blopes\SharedModels\Database\Seeders\AgentsSeeder',
        'Blopes\SharedModels\Database\Seeders\AgentsSeeder',
        'Blopes\SharedModels\Database\Seeders\AgentsSeeder',
    ];
    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadSeeders($this->seed_list);
    }

    protected function loadSeeders($seed_list)
    {
        $this->callAfterResolving(DatabaseSeeder::class, function ($seeder) use ($seed_list) {
            foreach ($seed_list as $path) {
                $seeder->call($path);
                // Print out in console that the migration was successful
            }
        });
    }
        
}

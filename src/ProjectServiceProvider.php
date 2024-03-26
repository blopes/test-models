<?php

namespace Blopes\SharedModels;

use Blopes\SharedModels\Middleware\Authenticate;
use Blopes\SharedModels\Middleware\CustomEmailVerification;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Seeder as DatabaseSeeder;


class ProjectServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app('router')->aliasMiddleware('auth', Authenticate::class);
        app('router')->aliasMiddleware('custom_verified', CustomEmailVerification::class);
    }

    protected $seed_list = [
        'Blopes\SharedModels\Database\Seeders\ThumbnailSeeder',
        'Blopes\SharedModels\Database\Seeders\AgentsSeeder',
        'Blopes\SharedModels\Database\Seeders\OrganizationSizeSeeder',
        'Blopes\SharedModels\Database\Seeders\ClassificationSystemSeeder',
        'Blopes\SharedModels\Database\Seeders\FrameworkSeeder',
        'Blopes\SharedModels\Database\Seeders\CategorySeeder',
        'Blopes\SharedModels\Database\Seeders\PurposeSeeder',
        'Blopes\SharedModels\Database\Seeders\TypeWorkSeeder',
        'Blopes\SharedModels\Database\Seeders\RoleSeeder',
        'Blopes\SharedModels\Database\Seeders\StageChapterSeeder',
        'Blopes\SharedModels\Database\Seeders\StageSeeder',
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

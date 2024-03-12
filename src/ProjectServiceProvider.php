<?php

namespace MSource\SharedModels;

use Illuminate\Support\ServiceProvider;

class ProjectServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../database/migrations/2023_12_04_122358_create_projects_table.php' => base_path('database/migrations/2023_12_04_122358_create_projects_table.php'),
        ], 'project-migrations');
    }
}

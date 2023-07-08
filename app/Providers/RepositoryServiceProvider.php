<?php

namespace App\Providers;

use App\Interfaces\DeveloperTodoInterface;
use App\Repositories\DeveloperTodoRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DeveloperTodoInterface::class, DeveloperTodoRepository::class);
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
}

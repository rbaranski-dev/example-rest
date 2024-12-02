<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Interfaces\FirmaRepositoryInterface::class, \App\Repositories\FirmaRepository::class);
        $this->app->bind(\App\Interfaces\PracownikRepositoryInterface::class, \App\Repositories\PracownikRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

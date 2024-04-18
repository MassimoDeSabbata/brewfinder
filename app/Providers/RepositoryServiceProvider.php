<?php

namespace App\Providers;

use App\Interfaces\BreweryRepositoryInterface;
use App\Repositories\BreweryHttpRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BreweryRepositoryInterface::class, BreweryHttpRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

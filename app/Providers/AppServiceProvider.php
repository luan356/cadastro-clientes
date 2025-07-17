<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\ClienteRepositoryInterface;
use App\Repositories\Eloquent\ClienteRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    $this->app->bind(ClienteRepositoryInterface::class, ClienteRepository::class);    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Providers;

use App\Models\User;
use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\EloquentRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RepositoryInterface::class, function ($app) {
            return new EloquentRepository(new User());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UserSearchService;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // se debe registrar los servicios creados
        $this->app->singleton(UserSearchService::class, function($app){
            return new UserSearchService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}

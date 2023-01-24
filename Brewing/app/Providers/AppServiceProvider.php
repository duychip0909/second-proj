<?php

namespace App\Providers;

use App\Services\Implement\AdminService;
use App\Services\Implement\CoffeesService;
use Illuminate\Support\ServiceProvider;
use App\Services\Interfaces\IAdminService;
use App\Services\Interfaces\ICoffeesService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ICoffeesService::class, CoffeesService::class);
        $this->app->singleton(IAdminService::class, AdminService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

<?php

namespace App\Providers;

use App\Services\Implement\AdminService;
use App\Services\Implement\CoffeeBeansService;
use App\Services\Implement\CoffeesService;
use App\Services\Implement\StoryCategory;
use App\Services\Implement\StoryService;
use App\Services\Interfaces\ICoffeeBeansService;
use App\Services\Interfaces\IStory;
use App\Services\Interfaces\IStoryCategory;
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
        $this->app->singleton(ICoffeeBeansService::class, CoffeeBeansService::class);
        $this->app->singleton(IStoryCategory::class, StoryCategory::class);
        $this->app->singleton(IStory::class, StoryService::class);
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

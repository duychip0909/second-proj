<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;
use App\Repositories\Implements\AdminRepository;
use App\Repositories\Implements\CoffeeBeanRepository;
use App\Repositories\Implements\StoryCategoryRepository;
use App\Repositories\Implements\StoryRepository;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Repositories\Implements\CoffeeRepository;
use App\Repositories\Interfaces\CoffeeBeanRepositoryInterface;
use App\Repositories\Interfaces\CoffeeRepositoryInterface;
use App\Repositories\Interfaces\StoryCategoryInterface;
use App\Repositories\Interfaces\StoryInterface;
use Illuminate\Support\ServiceProvider;

class AppRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->singleton(CoffeeRepositoryInterface::class, CoffeeRepository::class);
        $this->app->singleton(AdminRepositoryInterface::class, AdminRepository::class);
        $this->app->singleton(CoffeeBeanRepositoryInterface::class, CoffeeBeanRepository::class);
        $this->app->singleton(StoryCategoryInterface::class, StoryCategoryRepository::class);
        $this->app->singleton(StoryInterface::class, StoryRepository::class);
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

<?php

namespace App\Repositories\Implements;

use App\Models\Beans;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\CoffeeRepositoryInterface;

class CoffeeBeanRepository extends BaseRepository implements CoffeeRepositoryInterface
{
    protected $model_class = Beans::class;
}

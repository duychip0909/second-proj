<?php

namespace App\Repositories\Implements;

use App\Models\Coffee;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\CoffeeRepositoryInterface;

class CoffeeRepository extends BaseRepository implements CoffeeRepositoryInterface
{
    protected $model_class = Coffee::class;
}

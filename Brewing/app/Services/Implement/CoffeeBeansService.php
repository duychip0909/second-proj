<?php

namespace App\Services\Implement;

use App\Repositories\Interfaces\CoffeeRepositoryInterface;
use App\Services\Interfaces\ICoffeeBeansService;

class CoffeeBeansService implements ICoffeeBeansService
{
    protected $coffeeBeanRepo;

    public function __construct(CoffeeRepositoryInterface $coffeeBeanRepo)
    {
        $this->coffeeBeanRepo = $coffeeBeanRepo;
    }
}

<?php

namespace App\Services\Implement;

use App\Services\Interfaces\ICoffeesService;
use App\Repositories\Interfaces\CoffeeRepositoryInterface;

class CoffeesService implements ICoffeesService
{
    protected $coffeeRepository;

    public function __construct(CoffeeRepositoryInterface $coffeeRepository)
    {
        $this->coffeeRepository = $coffeeRepository;
    }

    function store($data)
    {
        return $this->coffeeRepository->store($data);
    }
}

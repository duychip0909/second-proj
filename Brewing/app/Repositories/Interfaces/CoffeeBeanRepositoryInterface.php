<?php

namespace App\Repositories\Interfaces;

use App\Repositories\BaseRepositoryInterface;

interface CoffeeBeanRepositoryInterface extends BaseRepositoryInterface
{
    public function store($data);
}

<?php

namespace App\Repositories\Implements;

use App\Models\Beans;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\CoffeeBeanRepositoryInterface;
use App\Repositories\Interfaces\CoffeeRepositoryInterface;

class CoffeeBeanRepository extends BaseRepository implements CoffeeBeanRepositoryInterface
{
    protected $model_class = Beans::class;

    public function store($data)
    {
        $record = $this->model->newQuery()->create($data);
        $record->save();
        $record->refresh();
        return $record;
    }
}

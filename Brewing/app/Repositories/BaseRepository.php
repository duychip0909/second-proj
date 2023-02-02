<?php

namespace App\Repositories;
use App\Enums\CoffeeStatus;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model_class;
    /** var Model */
    protected $model;

    public function __construct()
    {
        if ($this->model_class) {
            $this->model = app()->make($this->model_class);
        }
    }

    public function store($data)
    {
        $record = $this->model->create($data);
        return $record;
    }

    public function edit($id)
    {
        return $this->model->find($id);
    }

    public function update($data, $id)
    {
        $record = $this->model->find($id);
        $record->update($data);
        return $record;
    }
}

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
        dd($this->model);
        $record = $this->model->newQuery()->create($data);
        $record->save();
        $record->refresh();
        return $record;
    }

    public function edit($id)
    {
        return $this->model->where('id', '=', $id)->first();
    }

    public function update($data, $id)
    {
        $record = $this->model->where('id', '=', $id)->first();
        $record->fill($data);
        $record->save();
        $record->refresh();
        return $record;
    }
}

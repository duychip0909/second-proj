<?php

namespace App\Repositories;

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
        $record = $this->model->newQuery()->create($data);
        $record->save();
        $record->refresh();
        return $record;
    }
}

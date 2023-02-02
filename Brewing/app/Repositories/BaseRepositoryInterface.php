<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function store($data);

    public function edit($id);

    public function update($data, $id);

}

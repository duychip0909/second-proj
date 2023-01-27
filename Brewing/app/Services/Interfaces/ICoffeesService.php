<?php

namespace App\Services\Interfaces;

interface ICoffeesService
{
    function store($data);

    function edit($id);

    function update($data, $id);
}

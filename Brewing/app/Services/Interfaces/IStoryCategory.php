<?php

namespace App\Services\Interfaces;

interface IStoryCategory
{
    function store($data);

    function getAll();

    function delete($id);

    function findById($id);

    function update($data, $id);
}

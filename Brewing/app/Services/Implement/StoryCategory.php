<?php

namespace App\Services\Implement;

use App\Repositories\Implements\StoryCategoryRepository;
use App\Repositories\Interfaces\StoryCategoryInterface;
use App\Services\Interfaces\IStoryCategory;

class StoryCategory implements IStoryCategory
{
    protected StoryCategoryInterface $storyCategoryRepo;

    public function __construct(StoryCategoryInterface $storyCategoryRepo)
    {
        $this->storyCategoryRepo = $storyCategoryRepo;
    }

    function store($data)
    {
        return $this->storyCategoryRepo->store($data);
    }

    function getAll()
    {
        return $this->storyCategoryRepo->getAll();
    }

    function delete($id)
    {
        return $this->storyCategoryRepo->delete($id);
    }

    function findById($id)
    {
        return $this->storyCategoryRepo->findById($id);
    }

    function update($data, $id)
    {
        return $this->storyCategoryRepo->update($data, $id);
    }
}

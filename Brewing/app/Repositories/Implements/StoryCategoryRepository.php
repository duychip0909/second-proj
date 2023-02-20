<?php

namespace App\Repositories\Implements;

use App\Models\StoryCategory;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\StoryCategoryInterface;

class StoryCategoryRepository extends BaseRepository implements StoryCategoryInterface
{
    protected $model_class = StoryCategory::class;
}

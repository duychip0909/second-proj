<?php

namespace App\Repositories\Implements;

use App\Models\Story;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\StoryInterface;

class StoryRepository extends BaseRepository implements StoryInterface
{
    protected $model_class = Story::class;

}

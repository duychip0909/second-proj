<?php

namespace App\Services\Implement;

use App\Repositories\Interfaces\StoryInterface;
use App\Services\Interfaces\IStory;
use Illuminate\Support\Str;

class StoryService implements IStory
{
    protected $storyRepository;

    public function __construct(StoryInterface $storyRepository)
    {
        $this->storyRepository = $storyRepository;
    }

    function store($data)
    {
        $currentMillis = round(microtime(true) * 1000);
        if(isset($data['image'])) {
            $uploadFileName = $currentMillis . '.' . $data['image']->extension();
            $extensionArr = ['.jpg', '.png', '.jpeg', '.svg'];
            $realUrl = str_replace($extensionArr, '.webp', $uploadFileName);
            $data['image']->move(public_path('storage/images'), $realUrl);
            $data['image'] = asset('storage/images/'.$realUrl);
        }
        $data['alias'] = Str::slug($data['title'], '-');
        $data['short'] = Str::limit($data['detail'], 20);
        $data['status'] = 1;
        return $this->storyRepository->store($data);
    }
}

<?php

namespace App\Services\Implement;

use App\Repositories\Interfaces\CoffeeBeanRepositoryInterface;
use App\Services\Interfaces\ICoffeeBeansService;

class CoffeeBeansService implements ICoffeeBeansService
{
    protected $coffeeBeanRepo;

    public function __construct(CoffeeBeanRepositoryInterface $coffeeBeanRepo)
    {
        $this->coffeeBeanRepo = $coffeeBeanRepo;
    }

    public function store($data)
    {
        $currentMillis = round(microtime(true) * 1000);
        if(isset($data['image'])) {
            $uploadFileName = $currentMillis . '.' . $data['image']->extension();
            $extensionArr = ['.jpg', '.png', '.jpeg', '.svg'];
            $realUrl = str_replace($extensionArr, '.webp', $uploadFileName);
            $data['image']->move(public_path('images'), $realUrl);
            $data['image'] = asset('images/'.$realUrl);
        }
        return $this->coffeeBeanRepo->store($data);
    }
}

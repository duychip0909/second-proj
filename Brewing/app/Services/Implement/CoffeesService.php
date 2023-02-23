<?php

namespace App\Services\Implement;

use App\Services\Interfaces\ICoffeesService;
use App\Repositories\Interfaces\CoffeeRepositoryInterface;

class CoffeesService implements ICoffeesService
{
    protected $coffeeRepository;

    public function __construct(CoffeeRepositoryInterface $coffeeRepository)
    {
        $this->coffeeRepository = $coffeeRepository;
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
        return $this->coffeeRepository->store($data);
    }

    function update($data, $id)
    {
        $currentMillis = round(microtime(true) * 1000);
        if(isset($data['image'])) {
            $uploadFileName = $currentMillis . '.' . $data['image']->extension();
            $extensionArr = ['.jpg', '.png', '.jpeg', '.svg'];
            $realUrl = str_replace($extensionArr, '.webp', $uploadFileName);
            $data['image']->move(public_path('storage/images'), $realUrl);
            $data['image'] = asset('storage/images/'.$realUrl);
        }
        return $this->coffeeRepository->update($data, $id);
    }

    function edit($id)
    {
        return $this->coffeeRepository->edit($id);
    }

}

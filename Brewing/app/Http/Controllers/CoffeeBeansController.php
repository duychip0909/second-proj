<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\ICoffeeBeansService;
use Illuminate\Http\Request;

class CoffeeBeansController extends Controller
{
    private $coffeeBeanService;

    public function __construct(ICoffeeBeansService $coffeeBeanService)
    {
        $this->coffeeBeanService = $coffeeBeanService;
    }

    public function manage()
    {
        return view('coffee-beans-manage');
    }
}

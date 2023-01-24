<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCoffeeRequest;
use App\Models\Beans;
use App\Services\Interfaces\ICoffeesService;

class CoffeeController extends Controller
{
    private $coffeeService;

    public function __construct(ICoffeesService $coffeeService)
    {
        $this->coffeeService = $coffeeService;
    }

    public function create()
    {
        $beans = Beans::all();
        return view('coffee-add', compact('beans'));
    }

    public function store(StoreCoffeeRequest $request)
    {
        try {
            $validated = $request->validated();
            $this->coffeeService->store($validated);
            if ($validated == null) {
                return back();
            }
            toast()->success('Successfully', 'Add coffee successfully');
            return back();
        } catch (\Exception $e) {
            toast()->error('Add coffee fail because: ' . $e->getMessage(), 'Error');
            return back();
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Enums\CoffeeStatus;
use App\Http\Requests\StoreCoffeeRequest;
use App\Models\Beans;
use App\Models\Coffee;
use App\Services\Interfaces\ICoffeesService;
use Illuminate\Session\Store;

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

    public function edit($id)
    {
        $coffee = $this->coffeeService->edit($id);
        $beans = Beans::all();
        return view('coffee-edit', compact('coffee', 'beans'));
    }

    public function status($id)
    {
        $coffee = Coffee::find($id);
        $coffee->status = ($coffee->status == CoffeeStatus::ACTIVE ? CoffeeStatus::INACTIVE : CoffeeStatus::ACTIVE);
        $coffee->save();
        return $coffee;
    }

    public function manage()
    {
        return view('coffee-manage');
    }

    public function store(StoreCoffeeRequest $request)
    {
        try {
            $validated = $request->validated();
            $this->coffeeService->store($validated);
            if (!$validated) {
                return back();
            }
            toast()->success('Successfully', 'Add coffee successfully');
            return back();
        } catch (\Exception $e) {
            toast()->error('Add coffee fail because: ' . $e->getMessage(), 'Error');
            return back();
        }
    }

    public function update(StoreCoffeeRequest $request, $id)
    {
        try {
            $validated = $request->validated();
            $this->coffeeService->update($validated, $id);
            if (!$validated) {
                return back();
            }
            toast()->success('Successfully', 'Add coffee successfully');
            return redirect()->route('coffee.manage');
        } catch (\Exception $e) {
            toast()->error('Add coffee fail because: ' . $e->getMessage(), 'Error');
            return back();
        }
    }
}

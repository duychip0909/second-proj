<?php

namespace App\Http\Controllers;

use App\Http\Requests\BeanAddRequest;
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

    public function store(BeanAddRequest $request)
    {
        try {
            $validated = $request->validated();
            $this->coffeeBeanService->store($validated);
            if (!$validated) {
                toast()->warning('Fail', 'Something wrong here');
                return back();
            }
            toast()->success('Successfully', 'Add bean successfully');
            return back();
        } catch (\Exception $e) {
            toast()->error('Fail', 'Add coffee fail because: ' . $e->getMessage());
            return back();
        }
    }
}

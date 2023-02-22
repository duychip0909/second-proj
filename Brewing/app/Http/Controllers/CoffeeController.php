<?php

namespace App\Http\Controllers;

use App\Enums\CoffeeStatus;
use App\Http\Requests\StoreCoffeeRequest;
use App\Models\Beans;
use App\Models\Coffee;
use App\Services\Interfaces\ICoffeesService;
use Illuminate\Session\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function manage_api()
    {
        $coffees = Coffee::all();
        return response()->json($coffees);
    }

    public function delete_api($id)
    {
        Coffee::find($id)->delete();
        $coffees = Coffee::all();
        return response()->json([
            'coffee' => $coffees,
            'message' => 'Successfully'
        ]);
    }

    public function store_api(StoreCoffeeRequest $request)
    {
        $validated = $request->validated();
        $currentMillis = round(microtime(true) * 1000);
        if(isset($validated['image'])) {
            $uploadFileName = $currentMillis . '.' . $validated['image']->extension();
            $extensionArr = ['.jpg', '.png', '.jpeg', '.svg'];
            $realUrl = str_replace($extensionArr, '.webp', $uploadFileName);
            $validated['image']->move(public_path('images'), $realUrl);
            $validated['image'] = asset('images/'.$realUrl);
        }
        Coffee::create($validated);
        return response()->json([
            'message' => 'Thêm thành công cà phê mới',
            'image1' => $validated['image']->extension(),
        ]);
    }

    public function upload(Request $request)
    {
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $path = $file->storeAs('public/images', $filename);
        $url = Storage::url($path);
        return response()->json([
            'url' => $url
        ]);
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

<?php

namespace App\Http\Controllers;

use App\Enums\DrinkOptions;
use App\Models\Coffee;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function shop()
    {
        $coffees = Coffee::all();
        $options = DrinkOptions::getValues();
        return view('welcome', compact('coffees', 'options'));
    }
}

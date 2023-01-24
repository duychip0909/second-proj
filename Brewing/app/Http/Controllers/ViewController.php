<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function shop()
    {
        $coffees = Coffee::all();
        return view('welcome', compact('coffees'));
    }
}

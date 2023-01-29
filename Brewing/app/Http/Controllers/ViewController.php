<?php

namespace App\Http\Controllers;

use App\Enums\DrinkOptions;
use App\Models\Coffee;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function shop()
    {
        $coffees = Coffee::all()->where('status', '=', 1);
        $options = DrinkOptions::getValues();
        return view('welcome', compact('coffees', 'options'));
    }

    public $subTotal;

    public function showCart()
    {
        $carts = session()->get('cart');
        $totalQuantity = count($carts);
        $subTotal = 0;
        foreach ($carts as $cart) {
            $subTotal += $cart['price'] * $cart['quantity'];
        }
        return view('cart', compact('carts', 'totalQuantity', 'subTotal'));
    }

    public function addToCart($id)
    {
        $coffee = Coffee::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'name' => $coffee->name,
                'price' => $coffee->price,
                'quantity' => 1,
                'image' => $coffee->image
            ];
        }
        session()->put('cart', $cart);
        echo "<pre>";
        print_r(session()->get('cart'));
    }
}

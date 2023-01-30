<?php

namespace App\Http\Controllers;

use App\Enums\DrinkOptions;
use App\Models\Coffee;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    function getCartData() {
        $carts = session()->get('cart');
        $totalQuantity = count($carts);
        $subTotal = 0;
        $cupTotal = 0;
        $coffees = Coffee::all()->where('status', '=', 1);
        $options = DrinkOptions::getInstances();
        foreach ($carts as $cart) {
            $subTotal += $cart['price'] * $cart['quantity'];
            $cupTotal += $cart['quantity'];
        }
        return compact('carts', 'totalQuantity', 'subTotal', 'cupTotal', 'coffees', 'options');
    }
    public function shop()
    {
        $cartData = $this->getCartData();
        return view('welcome', $cartData);
    }

    public function showCart()
    {
        $cartData = $this->getCartData();
        return view('cart', $cartData);
    }

    public function addToCart($id)
    {
        $coffee = Coffee::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'id' => $coffee->id,
                'name' => $coffee->name,
                'price' => $coffee->price,
                'quantity' => 1,
                'image' => $coffee->image
            ];
        }
        session()->put('cart', $cart);
        $cartData = $this->getCartData();
        return response()->json([
            'view' => view('welcome', $cartData)->render()
        ]);
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
           $carts = session()->get('cart');
           $carts[$request->id]['quantity'] = $request->quantity;
           session()->put('cart', $carts);
           $cartData = $this->getCartData();
           $viewName = $request->ajax() ? 'cart-items' : 'cart';
           $view = view($viewName, $cartData)->render();
           return response()->json([
               'view' => $view
           ]);
        }
    }

    public function removeCup(Request $request)
    {
        if ($request->id) {
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart', $carts);
            $cartData = $this->getCartData();
            $view = view('cart', $cartData)->render();
            return response()->json([
               'view' => $view
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Enums\DrinkOptions;
use App\Http\Requests\addToCartRequest;
use App\Models\Coffee;
use App\Models\Customer;
use App\Models\OrderItem;
use App\Models\Orders;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Noty;


class ViewController extends Controller
{
    function getCartData() {
        $carts = session()->get('cart', []);
        $totalQuantity = count($carts);
        $subTotal = array_reduce($carts, function($grand, $cart) {
            $grand += $cart['quantity'] * $cart['price'];
            return $grand;
        });
        $cupTotal = array_sum(array_column($carts, 'quantity'));
        $coffees = Coffee::all()->where('status', '=', 1);
        $options = DrinkOptions::getInstances();
        return compact('carts', 'totalQuantity', 'subTotal', 'cupTotal', 'coffees', 'options');
    }
    public function shop()
    {
        $cartData = $this->getCartData();
        return view('welcome', $cartData);
    }

    public function detail($id)
    {
        $cartData = $this->getCartData();
        $coffee = Coffee::find($id);
        return view('coffee-detail', $cartData, compact('coffee'));
    }

    public function priceHtl()
    {
        $cartData = $this->getCartData();
        $coffees = Coffee::orderBy('price', 'DESC')->get();
        $cartData['coffees'] = $coffees;
        return view('welcome', $cartData);
    }

    public function priceLth()
    {
        $cartData = $this->getCartData();
        $coffees = Coffee::orderBy('price', 'ASC')->get();
        $cartData['coffees'] = $coffees;
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
                'image' => $coffee->image,
            ];
        }
        session()->put('cart', $cart);
        $cartData = $this->getCartData();
        return response()->json([
            'view' => view('layouts.View.navbar-view', $cartData)->render(),
            'name' => $cart[$id]['name']
        ]);
    }

    public function order(addToCartRequest $request)
    {
        $cartData = $this->getCartData();
        $validatedData = $request->validated();
        try {
            if (!$validatedData) {
                toast('Something wrong here!','error','top-right');
                return back();
            } else {
                $customerData = [
                    'customer_name' => $validatedData['order_name'],
                    'customer_phone' => $validatedData['order_phone'],
                    'customer_email' => $validatedData['order_email'],
                    'customer_address' => $validatedData['order_address']
                ];

                $customer = Customer::firstOrCreate(
                    ['customer_phone' => $validatedData['order_phone']],
                    $customerData
                );

                $orderData = [
                    'customer_id' => $customer->id,
                    'order_total' => $cartData['subTotal'],
                    'order_name' => $validatedData['order_name'],
                    'order_phone' => $validatedData['order_phone'],
                    'order_email' => $validatedData['order_email'],
                    'order_address' => $validatedData['order_address'],
                ];

                $order = Orders::create($orderData);

                foreach ($cartData['carts'] as $item) {
                    $orderItemsData = [
                        'order_id' => $order->id,
                        'item_id' => $item['id'],
                        'bean_id' => $cartData['coffees'][0]->bean_id,
                        'quantity' => $item['quantity'],
                    ];

                    OrderItem::create($orderItemsData);
                }
                session()->forget('cart');
//                toast('Order placed successfully!','success','top-right');
                $res = response()->json([
                    'event' => 'Success',
                    'data' => $order
                ]);
                return redirect()->route('coffee.shop', compact('res'));
            }
        } catch (\Exception $e) {
            toast('Something went wrong!' . $e->getMessage(),'error','top-right');
            return back();
        }
    }
}

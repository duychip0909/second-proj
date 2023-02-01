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
           $viewName = $request->ajax() ? 'layouts/View/master-cart-layout' : null;
           $view = view($viewName, $cartData)->render();
           return response()->json([
               'view' => $view,
           ]);
        }
    }

    public function removeCup(Request $request)
    {
        if (!$request->id) {
            return response()->json([
                'error' => 'Cannot remove item, id missing.'
            ], 400);
        }

        $carts = session()->get('cart');
        unset($carts[$request->id]);
        session()->put('cart', $carts);
        $cartData = $this->getCartData();
        $view = view('cart', $cartData)->render();
        return response()->json([
           'view' => $view
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
                toast('Order placed successfully!','success','top-right');
                return redirect()->route('coffee.shop');
            }
        } catch (\Exception $e) {
            toast('Something went wrong!' . $e->getMessage(),'error','top-right');
            return back();
        }
    }

    public function search(Request $request)
    {
        $query = $request->all();
        $coffees = Coffee::where(function ($q) use ($query) {
            if ($query) {
                $q->where('name', 'like', "%{$query['query']}%")
                    ->orWhere('description', 'like', "%{$query['query']}%");
            }
        })->get();
        $subTotal = 0;
        $cupTotal = 0;
        $options = DrinkOptions::getInstances();
        return view('welcome', compact('coffees', 'subTotal', 'cupTotal', 'options'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Enums\DrinkOptions;
use App\Http\Requests\addToCartRequest;
use App\Models\Coffee;
use App\Models\Customer;
use App\Models\OrderItem;
use App\Models\Orders;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    function getCartData() {
        $carts = session()->get('cart');
        if (empty($carts)) {
            $carts = [];
        }
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

    public function order(addToCartRequest $request)
    {
        $cartData = $this->getCartData();
        $validated = $request->validated();
        try {
            if ($validated == null) {
                toast('Something wrong here!','error','top-right');
                return back();
            } else {
                $orderData = $validated;
                $orderData['order_total'] = $cartData['subTotal'];
                $customerData = array();
                $customerData['customer_name'] = $orderData['order_name'];
                $customerData['customer_phone'] = $orderData['order_phone'];
                $customerData['customer_email'] = $orderData['order_email'];
                $customerData['customer_address'] = $orderData['order_address'];
                $cartData['subTotal'] = $orderData['order_total'];
                $customer = Customer::where('customer_phone', '=', $orderData['order_phone'])->first();
                if ($customer == null) {
                    $newCustomer = new Customer();
                    $newCustomer->fill($customerData);
                    $newCustomer->save();
                    $newCustomer->refresh();
                }
                $order = new Orders;
                $order->fill($orderData);
                $order->save();
                $order->refresh();
                foreach ($cartData['carts'] as $item) {
                    $orderItems = new OrderItem;
                    $bill = array();
                    $bill['order_id'] = $order['id'];
                    $bill['item_id'] = $item['id'];
                    $bill['bean_id'] = $cartData['coffees'][0]->bean_id;
                    $bill['quantity'] = $item['quantity'];
                    $orderItems->fill($bill);
                    $orderItems->save();
                    $orderItems->refresh();
                }
                toast('Order successfully!','success','top-right');
                return redirect()->route('coffee.shop');
            }
        } catch (\Exception $e) {
            toast('Something wrong!' . $e->getMessage(),'error','top-right');
            return back();
        }
    }
}

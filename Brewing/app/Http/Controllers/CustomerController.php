<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Orders;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function manage()
    {
        $customers = Customer::all();
        foreach ($customers as $customer) {
            $orders = Orders::where('customer_id', '=', $customer->id)->get();
            $totalOrder = $orders->count();
            $customer['totalOrder'] = $totalOrder;
            foreach ($orders as $order) {
                $totalPrice = 0;
                $totalPrice += $order->order_total;
                $customer['grand'] = $totalPrice;
            }
        }
        return view('customer-manage', compact('customers'));
    }
}

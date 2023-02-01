<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Orders;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function manage()
    {
        $customers = Customer::with(['orders'])->get();
        foreach ($customers as $customer) {
            $customer['totalOrder'] = $customer->orders->count();
            $customer['grand'] = $customer->orders->sum('order_total');
        }
        return view('customer-manage', compact('customers'));
    }
}

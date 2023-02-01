<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function manage()
    {
        $orders = Orders::all();
        return view('order-manage', compact('orders'));
    }

    public function view($id)
    {
        $order = Orders::findOrFail($id);
        $orderTotal = $order->order_total;
        $order->processed = 1;
        $order->save();
        return view('order-detail', compact('order', 'orderTotal'));
    }

    public function delete($id)
    {
        Orders::findOrFail($id)->delete();
        $orders = Orders::all();
        return view('order-manage', compact('orders'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function manage()
    {
        $orders = Orders::all();
        return view('order-manage', compact('orders'));
    }

    public function view($id)
    {
        $order = Orders::where('id', '=', $id)
            ->first();
        return view('order-detail', compact('order'));
    }
}

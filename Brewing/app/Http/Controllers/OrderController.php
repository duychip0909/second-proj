<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    function getAllOrder()
    {
        return Orders::all();
    }

    public function manage()
    {
        $orders = $this->getAllOrder();
        return view('order-manage', compact('orders'));
    }

    public function view($id)
    {
        $order = Orders::find($id);
        $orderTotal = $order->order_total;
        $order->processed = 1;
        $order->save();
        return view('order-detail', compact('order', 'orderTotal'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        Orders::find($id)->delete();
        return response()->json([
            'mess' => 'thanh cong'
        ]);
    }

    public function edit($id)
    {
        $order = Orders::find($id);
        $subTotal = $order->order_total;
        return view('order-edit', compact('order', 'subTotal'));
    }

    public function editQuantityCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $item = OrderItem::find($request->id);
            $item->update([
                'quantity' => $request->quantity
            ]);
            $order = Orders::find($item->order->id);
            $subTotal = 0;
            foreach ($order->items as $item) {
                $subTotal += $item['quantity'] * $item->coffees->price;
            }
            $order->update(['order_total' => $subTotal]);
            $view = view('layouts.View.cart-detail-edit', compact('order', 'subTotal'))->render();
            return response()->json(['view' =>  $view]);
        }
    }

    public function deleteCupCart(Request $request)
    {
        if ($request->id) {
            $item = OrderItem::find($request->id);
            $item->delete();
            $order = Orders::find($item->order->id);
            $subTotal = 0;
            foreach ($order->items as $item) {
                $subTotal += $item['quantity'] * $item->coffees->price;
            }
            $order->update(['order_total' => $subTotal]);
            $view = view('layouts.View.cart-detail-edit', compact('order', 'subTotal'))->render();
            return response()->json(['view' =>  $view]);
        }
    }
}

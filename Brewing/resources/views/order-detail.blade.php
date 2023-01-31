@extends('layouts.admin.master')
@section('content')
    <div class="card mb-4">
        <h5 class="card-header">Order ID: {{$order->id}}</h5>
    </div>
    <div class="d-flex">
        <div class="card w-100 me-4" style="max-width: 400px">
            <h5 class="card-body border-bottom">Customer</h5>
            <div class="card-body pt-0">
                <h5 class="fs-6"><i class='bx bx-user fs-4 me-2'></i>{{$order->order_name}}</h5>
                <h5 class="fs-6"><i class='bx bx-phone fs-4 me-2' ></i>{{$order->order_phone}}</h5>
                <h5 class="fs-6"><i class='bx bx-envelope fs-4 me-2' ></i>{{$order->order_email}}</h5>
                <h5 class="fs-6"><i class='bx bx-location-plus fs-4 me-2'></i>{{$order->order_address}}</h5>
                <h5 class="fs-6"><i class='bx bx-cog fs-4 me-2'></i>{{$order->processed}}</h5>
            </div>
        </div>
        <div class="card flex-fill">
            <h5 class="card-header border-bottom">Order items</h5>
            <div class="card-body pt-0">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Cup</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach($order->items as $item)
                            <tr>
                                <td><strong>{{$item->id}}</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="coffee-img me-4">
                                            <img src="{{$item->coffees->image}}" alt="">
                                        </div>
                                        {{$item->coffees->name}}
                                    </div>
                                </td>
                                <td>{{$item->quantity}}</td>
                                <td>{{number_format($item->coffees->price)}}đ</td>
                                <td>
                                   {{number_format(($item->quantity) * ($item->coffees->price))}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection



@extends('layouts.admin.master')
@section('content')
    <div class="card">
        <h5 class="card-header">Coffee Manage</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                <tr>
                    <th>Order id</th>
                    <th>Customer name</th>
                    <th>Customer phone number</th>
                    <th>Status</th>
                    <th>Order total</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($orders as $order)
                    <tr>
                        <td><strong>{{$order->id}}</strong></td>
                        <td>{{$order->order_name}}</td>
                        <td>{{$order->order_phone}}</td>
                        <td>{{$order->processed}}</td>
                        <td>{{$order->order_total}}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu" style="">
                                    <a href="{{route('order.view', ['id' => $order->id])}}" class="dropdown-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-px-20 h-px-20">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        View
                                    </a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <button class="dropdown-item" type="button"><i class="bx bx-trash me-1"></i> Delete</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection



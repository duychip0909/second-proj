@extends('layouts.admin.master')
@section('content')
    <div class="card">
        <h5 class="card-header">Customer Manage</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="text-center">
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Customer phone</th>
                    <th>Customer email</th>
                    <th>Customer address</th>
                    <th>Purchased orders</th>
                    <th>Purchased price</th>
                    <th>Customer points</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0 text-center">
                @foreach($customers as $customer)
                    <tr>
                        <td><strong>{{$customer->id}}</strong></td>
                        <td>{{$customer->customer_name}}</td>
                        <td>{{$customer->customer_phone}}</td>
                        <td>{{$customer->customer_email}}</td>
                        <td>{{$customer->customer_address}}</td>
                        <td>{{number_format($customer->totalOrder)}}</td>
                        <td>{{number_format($customer->grand)}}đ</td>
                        <td>{{number_format($customer->grand / 1000)}}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu" style="">
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

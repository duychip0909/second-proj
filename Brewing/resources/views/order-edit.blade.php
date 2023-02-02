@extends('layouts.admin.master')
@section('content')
    <div class="card mb-4">
        <h5 class="card-header">Order ID: {{$order->id}}</h5>
    </div>
    <div class="d-flex">
        <div class="card w-100 me-4" style="max-width: 400px">
            <h5 class="card-body border-bottom">Customer</h5>
            <div class="card-body pt-0">
                <h5 class="fs-6 d-flex align-items-center">
                    <i class='bx bx-user fs-4 me-2'></i>
                    <input type="text" class="form-control" value="{{$order->order_name}}">
                </h5>
                <h5 class="fs-6 d-flex align-items-center">
                    <i class='bx bx-phone fs-4 me-2'></i>
                    <input type="text" class="form-control" value="{{$order->order_phone}}">
                </h5>
                <h5 class="fs-6 d-flex align-items-center">
                    <i class='bx bx-envelope fs-4 me-2' ></i>
                    <input type="text" class="form-control" value="{{$order->order_email}}">
                </h5>
                <h5 class="fs-6 d-flex align-items-center">
                    <i class='bx bx-location-plus fs-4 me-2'></i>
                    <input type="text" class="form-control" value="{{$order->order_address}}">
                </h5>
                <h5 class="fs-6 d-flex align-items-center">
                    <i class='bx bx-cog fs-4 me-2'></i>
                    <input type="text" class="form-control" value="{{$order->processed}}">
                </h5>
            </div>
        </div>
        @include('layouts.View.cart-detail-edit')
    </div>
@endsection

@section('customScript')
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            let updateQuantityCartUrl = '{{route('editQuantityCart')}}';
            let deleteCupCartUrl = '{{route('deleteCupCart')}}';

            function updateQuantityDetailCart() {
                let input = $(this);
                let id = input.data('id');
                let quantity = input.val();
                $.getJSON(`${updateQuantityCartUrl}?id=${id}&quantity=${quantity}`, function (response) {
                    $('.cart-detail').html(response.view);
                });
            }

            function deleteDetailCupCart(e) {
                e.preventDefault();
                let click = $(this);
                let id = click.data('id');
                $.getJSON(`${deleteCupCartUrl}?id=${id}`, function (response) {
                   $('.cart-detail').replaceWith($(response.view));
                });
            }

            $(document).on('change', '.incrementInput', updateQuantityDetailCart);
            $(document).on('click', '.trash-icon', deleteDetailCupCart);
        });
    </script>
@endsection


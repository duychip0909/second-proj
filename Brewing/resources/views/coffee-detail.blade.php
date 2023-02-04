@extends('layouts.View.master-view-layout')
@section('content')
    @include('layouts.View.navbar-view')
    <section class="flex justify-between container mx-auto mt-8">
        <div class="sidebar max-w-xs w-full shadow py-3 px-5 bg-white ">
            <ul class="mt-5 uppercase">
                <li>Price:</li>
                <li class="my-2 ml-2 filter"><a href="{{route('price-htl')}}">high to low</a></li>
                <li class="my-2 ml-2 filter"><a href="{{route('price-lth')}}">low to high</a></li>
            </ul>
        </div>
        <div class="menu w-full shadow ml-8 bg-white ">
            <div class="grid grid-cols-4 gap-8 p-8">
                <div class="shadow">
                    <img class="aspect-square object-cover" src="https://images.unsplash.com/photo-1596078841242-12f73dc697c6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80" alt="">
                </div>
                <div class="col-span-3 flex flex-col justify-between">
                    <h5 class="coffee-name uppercase text-3xl">americano</h5>
                    <h5 class="coffee-price uppercase text-2xl">45,000đ</h5>
                    <label for="option" class="block">Option:</label>
                    <select name="option" id="">
                        <option value="0">Hot</option>
                        <option value="1">Iced</option>
                    </select>
                    <label for="quantity" class="block">Quantity:</label>
                    <input type='number'>
                    <button data-url="http://127.0.0.1:8000/coffee/addToCart/1" class="w-64 block px-16 py-2 transition ease-in-out duration-200 hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none btnAddToCart">Add
                        to cart
                    </button>
                </div>
            </div>
            <div class="description p-8 pt-0">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
            <div class="related-cups">

            </div>
        </div>
    </section>
@endsection

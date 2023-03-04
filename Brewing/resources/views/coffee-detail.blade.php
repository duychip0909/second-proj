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
        <div class="menu w-full shadow ml-8 bg-white" style="width: calc(1536px - 20rem)">
            <div class="grid grid-cols-4 gap-8 p-8">
                <div class="shadow">
                    <img class="aspect-square object-cover" src="{{$coffee->image}}" alt="">
                </div>
                <div class="col-span-3 flex flex-col justify-between">
                    <h5 class="coffee-name uppercase text-3xl">{{$coffee->name}}</h5>
                    <h5 class="coffee-price uppercase text-2xl">{{number_format($coffee->price)}} đ</h5>
                    <label for="option" class="block">Option:</label>
                    <select name="option" id="" class="block py-2 px-0.5 text-gray-600 w-16 text-sm border w-40">
                        @foreach($options as $option)
                            <option value="{{$option}}">{{$option->key}}</option>
                        @endforeach
                    </select>
                    <label for="quantity" class="block">Quantity:</label>
                    <input type='number' class="w-16 increment-input border p-1" min="1" max="999" step="1" value="1">
                    <button data-url="http://127.0.0.1:8000/coffee/addToCart/1" class="w-64 block px-16 py-2 transition ease-in-out duration-200 hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none btnAddToCart">Add
                        to cart
                    </button>
                </div>
            </div>
            <div class="description p-8 pt-0">
                <p>{{$coffee->description}}</p>
            </div>
            <div class="related-cups p-8">
                <h5 class="uppercase">Sản phẩm liên quan</h5>
                <div class="content">
                    <div class="swiper related-product">
                        <div class="swiper-wrapper">
                            @foreach($coffees as $coffee)
                                <div class="swiper-slide">
                                    @include('layouts.Components.card-product')
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.View.master-view-layout')
@section('content')
    @include('layouts.View.navbar-view')
    <section class="flex justify-between container mx-auto mt-8">
        <div class="sidebar max-w-xs w-full shadow py-3 px-5 bg-white">
            <ul>
                <li><a href="#">high to low</a></li>
                <li><a href="#">low to high</a></li>
            </ul>
        </div>
        <div class="menu w-full shadow ml-8 bg-white">
            <div class="menu-title py-3 px-5 border-b border-slate-200">
                <h5 class="text-2xl">Coffee</h5>
            </div>
            <div class="content p-5">
                <div class="grid grid-cols-4 gap-8">
                    @foreach($coffees as $coffee)
                        <div class="w-full max-w-sm bg-white border border-gray-200 hover:shadow dark:bg-gray-200 dark:border-gray-200 drinks">
                            <a href="#" class="block drinks-img-wrapper w-full h-full overflow-hidden">
                                <img class="w-full h-full object-cover drinks-img" src="{{$coffee->image}}" alt="product image" />
                            </a>
                            <div class="p-3">
                                <a href="#">
                                    <h5 class="text-base font-bold tracking-tight text-gray-900 dark:text-white text-center">
                                        {{$coffee->name}}
                                        @foreach($options as $option)
                                            <span class="text-xs px-0.5 rounded {{$option->value == 1 ? 'text-red-600 bg-red-200' : 'text-blue-600 bg-blue-200'}}">{{$option->key}}</span>
                                        @endforeach
                                    </h5>
                                </a>
                                <div class="flex items-center justify-between text-base mt-4">
                                    <span class="font-medium text-gray-900 dark:text-white">{{number_format($coffee->price)}}đ</span>
                                    <button data-url="{{route('coffee.addToCart', ['id' => $coffee->id])}}" class="px-2 py-0.5 transition ease-in-out duration-200 hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none btnAddToCart">Add
                                        to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

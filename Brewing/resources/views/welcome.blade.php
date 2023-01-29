<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    </head>
    <body class="bg-slate-100">
        <section class="shadow-md bg-white">
            <div class="container mx-auto">
                <div class="navbar flex justify-between items-center h-32">
                    <div class="logo">
                        Brewing
                    </div>
                    <div class="navbar-nav">
                        <ul class="flex">
                            <li class="mx-4"><a href="#">Home</a></li>
                            <li class="mx-4"><a href="#">Our Cups</a></li>
                            <li class="mx-4"><a href="#">About us</a></li>
                            <li class="mx-4"><a href="#">Contact</a></li>
                            <li class="mx-4"><a href="{{route('coffee.showCart')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>

                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
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
                                                <span class="text-xs px-0.5 rounded {{$option == 'Hot' ? 'text-red-600 bg-red-200' : 'text-blue-600 bg-blue-200'}}">{{$option}}</span>
                                            @endforeach
                                        </h5>
                                    </a>
                                    <div class="flex items-center justify-between text-base mt-4">
                                        <span class="font-medium text-gray-900 dark:text-white">{{$coffee->price}}đ</span>
                                        <button data-url="{{route('coffee.addToCart', ['id' => $coffee->id])}}" class="px-2 py-0.5 transition ease-in-out duration-200 hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none btnAddToCart">Add
                                            to cart</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
        <script>
            $('.btnAddToCart').on('click', function() {
               let btn = $(this);
                execute = btn.data('url');
                $.getJSON(execute);
            });
        </script>
    </body>
</html>

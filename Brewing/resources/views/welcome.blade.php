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
                                            {{$coffee->name}}</h5>
                                    </a>
                                    <div class="flex items-center justify-center">
                                        <span class="text-base font-medium text-gray-900 dark:text-white">{{$coffee->price}}đ</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>

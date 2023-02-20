<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brewing</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    @livewireStyles
    <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/needim/noty@77268c46/lib/noty.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body class="bg-slate-100">

{{--NAVBAR--}}
@include('layouts.View.navbar-view')


{{--body content--}}
<section class="flex justify-between container mx-auto mt-8">
    <div class="sidebar max-w-xs w-full shadow py-3 px-5 bg-white ">
        @yield('sub-sidebar')
    </div>
    <div class="menu w-full shadow ml-8 bg-white">
        <div class="menu-title py-3 px-5 border-b border-slate-200 flex justify-between">
            <h5 class="text-2xl">{{$title}}</h5>
        </div>
        <div class="content p-5">
            @yield('content')
        </div>
    </div>
</section>


{{--    js script--}}
@include('layouts.View.master-view-js-layout')
@livewireScripts
@yield('customScript')
</body>
</html>

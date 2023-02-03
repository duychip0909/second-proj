<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brewing</title>
    @vite('resources/css/app.css')
    @livewireStyles
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body class="bg-slate-100">

{{--body content--}}
    @yield('content')

{{--    js script--}}
    @include('layouts.View.master-view-js-layout')
    @livewireScripts
    @yield('customScript')
</body>
</html>

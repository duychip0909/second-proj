<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="{{asset('public/css/styles.css')}}">
    </head>
    <body>
        <section class="shadow-md">
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
    </body>
</html>

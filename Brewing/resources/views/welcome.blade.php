@extends('layouts.View.page-layout')

@section('sub-sidebar')
    <form action="{{route('coffee.search')}}" method="get">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <div class="box-search relative">
                <input type="search" id="default-search" name="query" class="searchbox block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 focus:border-none" placeholder="Search..." required>
                @include('searchBox')
            </div>
            <button type="submit" hidden class="text-white absolute right-1 bottom-1 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-2 py-1 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"></button>
        </div>
    </form>
    <ul class="mt-5 uppercase">
        <li>Price:</li>
        <li class="my-2 ml-2 filter"><a href="{{route('price-htl')}}">high to low</a></li>
        <li class="my-2 ml-2 filter"><a href="{{route('price-lth')}}">low to high</a></li>
    </ul>
    <div id="example"></div>
@endsection

@section('content')
    <div class="grid grid-cols-4 gap-8 isotope-grid">
        @foreach($coffees as $coffee)
            <div class="w-full max-w-sm bg-white  overflow-hidden border border-gray-200 hover:shadow dark:bg-gray-200 dark:border-gray-200 drinks grid-item">
                <a href="{{route('coffee.detail', ['id' => $coffee->id])}}" class="block drinks-img-wrapper w-full h-full overflow-hidden ">
                    <img class="w-full h-full object-cover drinks-img" src="{{$coffee->image}}" alt="product image" />
                </a>
                <div class="p-3">
                    <a href="#">
                        <h5 class="text-base font-bold tracking-tight text-gray-900 dark:text-white text-center coffee-name">
                            {{$coffee->name}}
                            @foreach($options as $option)
                                <span class="text-xs px-0.5 rounded {{$option->value == 1 ? 'text-red-600 bg-red-200' : 'text-blue-600 bg-blue-200'}}">{{$option->key}}</span>
                            @endforeach
                        </h5>
                    </a>
                    <div class="flex items-center justify-between text-base mt-4 relative">
                        <span class="font-medium text-gray-900 dark:text-white">{{number_format($coffee->price)}}đ</span>
                        <button data-url="{{route('coffee.addToCart', ['id' => $coffee->id])}}" class="px-2 py-0.5 transition ease-in-out duration-200 hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none btnAddToCart">Add
                            to cart
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('customScript')
    <script>
        $(document).ready(function () {
            {{--$.ajax({--}}
            {{--    url: {{route('coffee.order')}},--}}
            {{--    type: 'POST',--}}
            {{--    data: { CSRF: getCSRFTokenValue()},--}}
            {{--    success: function (data) {--}}
            {{--        if (data.event === 'Success') {--}}
            {{--            console.log('helllo ');--}}
            {{--        }--}}
            {{--    }--}}
            {{--});--}}
        });
        let debounceTimer;
        $('.searchbox').keyup(function () {
            let q = $(this).val();
            if (q.length > 2) {
                let data = {
                    q: q
                }
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(function () {
                    $.ajax({
                        type: 'get',
                        dataType: 'json',
                        data: data,
                        url: '{{route('view.searching')}}',
                        success: function (res) {
                            // $('#searchBox').html(res.view);
                            $('#searchBox').show();
                            let html = '';
                            $.each(res, function (index, coffee) {
                                url = `/coffee/detail/${coffee.id}`;
                                html += `<a class="result block transition p-2 mb-2" href="${url}">`;
                                html += `<div class="flex items-center transition">`;
                                html += `<img src="${coffee.image}" alt="" class="w-16 h-16 aspect-square object-cover">`;
                                html += `<h5 class="ml-2">${coffee.name}</h5>`;
                                html += `</div>`;
                                html += `</a>`
                            })
                            $('#searchBox').hide();
                            $('#searchBox').html(html).fadeIn();
                        }
                    })
                }, 500)
            } else {
                $('#searchBox').html('');
                $('#searchBox').hide();
            }
        })
    </script>
@endsection


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
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-8 isotope-grid">
        @foreach($coffees as $coffee)
            @include('layouts.Components.card-product')
        @endforeach
    </div>
@endsection

@section('customScript')
    <script type="module">
        $(document).ready(function () {

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
                                let url = `/coffee/detail/${coffee.id}`;
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


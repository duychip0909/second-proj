@extends('layouts.View.page-layout')

@section('sub-sidebar')

@endsection

@section('content')
    <div class="grid grid-cols-2 gap-5">
        @foreach($stories as $story)
            <a href="{{route('story.detail', ['id' => $story->id])}}" class="flex flex-col items-center bg-white border border-gray-200 hover:shadow transition md:flex-row md:max-w-xl">
                <img class="object-cover w-full h-96 md:h-auto md:w-48" src="{{$story->image}}" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{!! $story->title !!}</h5>
                    <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {!! $story->short !!}
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection

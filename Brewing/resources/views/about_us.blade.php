@extends('layouts.View.page-layout')

@section('sub-sidebar')

@endsection

@section('content')
    <div class="grid grid-cols-2 gap-5">
        @foreach($stories as $story)
            <a href="{{route('story.detail', ['id' => $story->id])}}" class="flex flex-row bg-white border border-gray-200 hover:shadow transition">
                <div class="story-frame w-48 h-36">
                    <img class="object-cover w-full h-full" src="{{$story->image}}" alt="">
                </div>
                <div class="p-4 leading-normal whitespace-normal flex-1">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white line-clamp-2">{!! $story->title !!}</h5>
                    <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {!! $story->short !!}
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection

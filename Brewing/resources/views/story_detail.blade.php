@extends('layouts.View.page-layout')

@section('sub-sidebar')

@endsection

@section('content')
    <div class="title pb-10">
        <h5 class="uppercase text-3xl">{{$story->title}}</h5>
    </div>
    <img src="{{$story->image}}" alt="" class="aspect-square">
    <div class="content pt-20">
        {!! $story->detail !!}
    </div>
@endsection

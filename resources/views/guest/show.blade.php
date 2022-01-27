@extends('layouts.app')
@section('content')

<div class="w-50 m-auto">
    <p class="mt-4">{{$post->date}} | {{$post->author}}</p>
    <h1>{{$post->title}}</h1>
    <div class="w-100 m-auto">
        <img class="w-100" src="{{$post->image}}" alt="">
    </div>
    <div class="mt-4">
        <p>{{$post->article}}</p>
    </div>
</div>



@endsection
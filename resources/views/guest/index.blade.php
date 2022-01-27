@extends('layouts.app')

@section('content')
<div class="container_content row w-75 m-auto bg-white pt-2">
    @foreach ($posts as $post)
    <div class="singolo col-4">
        <a href="{{route('guest.show', $post->id)}}">
            <img class="w-100" src="{{$post->image}}" alt="">
            <h1 class="text-black">{{$post->title}}</h1>
            <p class="text-secondary">{{$post->subtitle}}</p>
        </a>
    </div>


    @endforeach
</div>

@endsection
@extends('layouts.app')
@section('content')

<div class="w-50 bg-white m-auto p-4">
    <div class="d-flex justify-content-between">
        <p class="text-secondary fs-6">{{$post->date}} | {{$post->author}} | <a class="text-decoration-none shadow p-2 " href="{{route('categories.posts', $post->category->id)}}"><strong>{{$post->category->name}} </strong></a> </p>
        <div>
            @foreach ($post->tags as $tag)
            <strong class="text-decoration-none shadow p-2 text-success">{{$tag->name}}</strong>
            @endforeach
        </div>
    </div>
    <h1 class="mb-3"><strong>{{$post->title}}</strong></h1>
    <div class="w-100 m-auto">
        <img class="w-100" src="{{$post->image}}" alt="">
    </div>
    <div class="mt-4">
        <p>{{$post->article}}</p>
    </div>
</div>



@endsection
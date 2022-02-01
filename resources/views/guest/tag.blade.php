@extends('layouts.app')
@section('content')
<h1 class="text-center mt-3 mb-3">
    <strong>Ecco tutti i post con i tag {{$tag->name}}</strong>
</h1>
<div class="container_category_post w-75 bg-white p-3 m-auto d-flex flex-wrap">
    @foreach ($posts as $post)
    <div class="col-4 px-2">
        <a class="text-decoration-none " href="{{route('guest.show', $post->id)}}">
            <img class="w-100 mb-4" src=" {{$post->image}}" alt="">
            <h3 class="text-black"><strong>{{$post->title}}</strong></h3>
            <p class=" text-secondary fs-6">{{$post->subtitle}}</p>






        </a>



    </div>
    @endforeach
</div>
@endsection
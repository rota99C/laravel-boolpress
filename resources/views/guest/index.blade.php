@extends('layouts.app')

@section('content')


<div class="container_content position-relative row w-75 pt-4 m-auto bg-white ">
    @foreach ($posts as $post)
    <div @if ($loop->first) class="jumbo" @endif>
        <a href="{{route('guest.show', $post->id)}}">
            @if($loop->first)<p class="text-secondary border border-white fs-6 text-center shadow"><strong>IN EVIDENZA</strong> </p>@endif

            <img @if($loop->iteration > 3) class="h-60" @else class="h-75" @endif src="{{asset('storage/' . $post->image)}}" alt="">
            <h3 class="text-black"><strong>{{$post->title}}</strong></h3>
            @if($loop->first || $loop->iteration > 3)<p class="text-secondary fs-6">{{$post->subtitle}}</p>@endif
        </a>
    </div>
    @endforeach
</div>

<div class="postion position-absolute category_menu position-fixed">
    <div>
        <div class="bg-white shadow ps-3 pe-3 pt-2 pb-2 mb-3">
            <p class="fs-6 text-primary"><strong>CATEGORIES</strong></p>
        </div>
        <div class="bg-white shadow ps-3 pe-3 pt-2 pb-2 mb-3">
            @foreach ($categories as $category)
            <a class="text-decoration-none text-secondary" href="{{route('categories.posts', $category->id)}}">
                <p class="pt-2 pb-2">{{$category->name}}</p>
            </a>

            @endforeach
        </div>
    </div>

    <div>
        <div class="bg-white shadow ps-3 pe-3 pt-2 pb-2 mb-3">
            <p class="fs-6 text-success"><strong>TAGS</strong></p>
        </div>
        <div class="bg-white shadow ps-3 pe-3 pt-2 pb-2 mb-3">
            @foreach ($tags as $tag)
            <a class="text-decoration-none text-secondary" href="{{route('tags.posts', $tag->id)}}">
                <p class="pt-2 pb-2">{{$tag->name}}</p>
            </a>

            @endforeach
        </div>
    </div>




</div>







@endsection
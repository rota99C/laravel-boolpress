@extends('layouts.admin')
@include ('partials.sidebar')

@section('content')

<div class="container_table ms-3">
    <div class="d-flex w-25 justify-content-around pt-4 pb-4">
        <i class="fas fa-database"></i>
        <h3>Posts list</h3>
        <button type="button" class="btn btn-success"><a class="text-white" href="{{route('admin.posts.create')}}">+ create </a>
        </button>
    </div>
    @if (session('messaggio'))
    <div class="alert alert-success">
        {{session('messaggio')}}
    </div>
    @endif

    <div class="d-grid gap-3">

    </div>
    <table class="table">
        <thead class="text-secondary">
            <tr>
                <th>Title</th>
                <th>Subtitle</th>
                <th class="article-column">Article</th>
                <th>Images</th>
                <th>Tags</th>
                <th>Category</th>
                <th>Date</th>
                <th>Author</th>
                <th>Tools</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td scope="row">{{$post -> title}}</td>
                <td>{{$post->subtitle}}</td>
                <td class="article"><span>{{$post -> article }}</span></td>
                <td class=""> <img class="col-4" src="{{$post -> image}}" alt="">
                </td>
                <td>@foreach ($post->tags as $tag) {{$tag->name}} @endforeach</td>
                <td>{{$post->category->name}}</td>
                <td>{{$post -> date}}</td>
                <td>{{$post -> author}}</td>
                <td>
                    <a href="{{route('admin.posts.edit', $post->id)}}"><i class="fas fa-pen m-2"></i></a>
                    <form action="{{route('admin.posts.destroy', $post->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="bottone_delete border-0" type="submit"><i class="fas fa-trash-alt text-danger m-2 "></i></button>
                    </form>
                    <a href="{{route('guest.show', $post->id)}}"><i class="far fa-eye text-success m-2"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    <div class="d-flex justify-content-center mt-3">
        {{$posts->links()}}
    </div>
</div>
@endsection
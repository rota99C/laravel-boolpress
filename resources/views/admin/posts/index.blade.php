@extends('layouts.admin')

@section('content')

<div class="container_table ms-3">
    <div class="d-flex w-25 justify-content-around pt-4 pb-4">
        <i class="fas fa-database"></i>
        <h3>Posts list</h3>
        <button type="button" class="btn btn-success"><a class="text-white">+ create</a>
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
                <td></td>
                <td>{{$post -> date}}</td>
                <td>{{$post -> author}}</td>
                <td>
                    <a href=""><i class="fas fa-pen m-2"></i></a>
                    <form action="" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="bottone_delete" type="submit"><i class="fas fa-trash-alt text-danger m-2"></i></button>
                    </form>
                    <a href=""><i class="far fa-eye text-success m-2"></i></a>
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
@extends ('layouts.app')
@section('content')
<div class="container_category w-75 m-auto bg-white d-flex flex-wrap">
    <div class="col-3 ">
        <form action="{{route('admin.categories.store')}}" method="post">
            @csrf
            <input value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror mb-4" type="text" name="name" id="name" placeholder="Insert here the name of the post" aria-describedby="helpId">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="d-flex justify-content-center mb-3">
                <button type="submit" class="btn btn-primary text-white">Save</button>
            </div>
        </form>
    </div>
    @foreach ($categories as $category)
    <div class="col-3">
        <h1>{{$category->name}}</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#edit_category_{{$category->id}}">
            EDIT
        </button>
        <!-- Modal -->
        <div class="modal fade" id="edit_category_{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_{{$category->id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal_{{$category->id}}">Edit the category {{$category->name}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.categories.update', $category->id)}}" method="post">
                            @csrf
                            @method ('PUT')
                            <input value="{{$category->name}}" class="form-control @error('name') is-invalid @enderror mb-4" type="text" name="name" id="name" placeholder="" aria-describedby="helpId">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="d-flex justify-content-center mb-3">
                                <button type="submit" class="btn btn-primary text-white">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endforeach

</div>








@endsection
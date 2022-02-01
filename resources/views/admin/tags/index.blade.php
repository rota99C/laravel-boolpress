@extends ('layouts.admin')
@include ('partials.sidebar')
@section('content')
<div class="container_category w-100 m-auto bg-white d-flex flex-wrap p-5">
    <div class="col-3 d-flex text-center align-items-center justify-content-center ">
        <form action="{{route('admin.tags.store')}}" method="post">
            @csrf
            <label class="mb-2" for="name">CREATE A TAG</label>
            <input value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror mb-4" type="text" name="name" id="name" placeholder="Insert here the tag of the post" aria-describedby="helpId">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="d-flex justify-content-center mb-3">
                <button type="submit" class="btn btn-success text-white">+</button>
            </div>
        </form>
    </div>
    @foreach ($tags as $tag)
    <div class="col-3 d-flex align-items-center justify-content-center ">
        <div class="d-flex flex-column align-items-center justify-content-center shadow w-75 h-75">

            <h4>{{$tag->name}}</h4>
            <!-- Button trigger modal -->
            <div>
                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="edit_tag_{{$tag->id}}">
                    <i class="fas fa-pencil-alt text-white"></i>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="edit_tag_{{$tag->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_{{$tag->id}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal_{{$tag->id}}">Edit the tag {{$tag->name}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('admin.tags.update', $tag->id)}}" method="post">
                                    @csrf
                                    @method ('PUT')
                                    <input value="{{$tag->name}}" class="form-control @error('name') is-invalid @enderror mb-4" type="text" name="name" id="name" placeholder="" aria-describedby="helpId">
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

                <button type="button" class="btn btn-danger btn-lg" data-bs-toggle="modal" data-bs-target="#delete_tag_{{$tag->id}}">
                    <i class="fas fa-trash text-white"></i>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="delete_tag_{{$tag->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_{{$tag->id}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal_{{$tag->id}}">Delete the tag {{$tag->name}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('admin.tags.destroy', $tag->id)}}" method="post">
                                    @csrf
                                    @method ('DELETE')
                                    <div class="d-flex justify-content-center mb-3">
                                        <button type="submit" class="btn btn-primary text-white">DELETE</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    @endforeach
    <div class="d-flex justify-content-center mt-3 w-100">
        {{$tags->links()}}
    </div>

</div>








@endsection
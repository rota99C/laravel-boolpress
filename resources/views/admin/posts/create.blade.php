@extends('layouts.admin')
<div class="d-flex title_edit justify-content-center pt-4 pb-4">
    <i class="fas fa-plus fs-2 ms-3 me-3 text-success"></i>
    <h3>Create a Post</h3>
</div>

<form action="{{route('admin.posts.store')}}" method="post">
    @csrf

    <div class="mb-4 ms-4 me-4">
        <label for="title" class="form-label mb-2 text-secondary"><strong>Title</strong> </label>
        <input value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror mb-4" type="text" name="title" id="title" placeholder="Insert here the title of the post" aria-describedby="helpId">
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="subtitle" class="form-label mb-2 text-secondary"><strong>subTitle</strong> </label>
        <input value="{{old('subtitle')}}" class="form-control @error('subtitle') is-invalid @enderror mb-4" type="text" name="subtitle" id="subtitle" placeholder="Insert here the subtitle of the post" aria-describedby="helpId">
        @error('subtitle')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <label for="article" class="form-label text-secondary"><strong>Post article</strong> </label>
        <textarea class="form-control @error('article') is-invalid @enderror" type="text" name="article" id="article" placeholder="Insert here the article of the post" aria-describedby="helpId">{{old('article')}}</textarea>
        <small>Make sure you don't exceed 2000 characters, spaces included.</small>
        @error('article')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <label for="image" class="form-label mb-2 mt-4 text-secondary"><strong>Image thumb URL</strong> </label>
        <input value="{{old('image')}}" class="form-control @error('image') is-invalid @enderror mb-4" type="text" name="image" id="image" placeholder="Insert the image URL" aria-describedby="helpId">
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <label for="category_id" class="form-label mb-2 text-secondary"><strong>category_id</strong> </label>
        <select class="bg-primary text-white" name="category_id" id="category_id">
            <option value="" selected>scegli una categoria</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">
                {{$category->name}}
            </option>
            @endforeach
        </select>
        @error('category_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <label for="date" class="form-label mb-2 mt-4 text-secondary"><strong>date</strong> </label>
        <input value="{{old('date')}}" class="form-control @error('date') is-invalid @enderror mb-4" type="date" name="date" id="date" placeholder="" aria-describedby="helpId">
        @error('date')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="author" class="form-label mb-2 text-secondary"><strong>author</strong> </label>
        <input value="{{old('author')}}" class="form-control @error('author') is-invalid @enderror mb-4" type="text" name="author" id="author" placeholder="" aria-describedby="helpId">
        @error('author')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror





    </div>



    <div class="d-flex justify-content-center mb-3">
        <button type="submit" class="btn btn-primary text-white">Save</button>
    </div>


</form>
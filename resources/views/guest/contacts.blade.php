@extends('layouts.app')
@section ('content')

<form action="{{route('contacts.send')}}" method="post">
    @csrf

    <div class="mb-4 ms-4 me-4">
        <label for="name" class="form-label mb-2 text-secondary"><strong>Inserisci il tuo nome </strong> </label>
        <input value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror mb-4" type="text" name="name" id="name" placeholder="Insert here the name of the post" aria-describedby="helpId">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="email" class="form-label mb-2 text-secondary"><strong> inserisci la tua email</strong> </label>
        <input value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror mb-4" type="email" name="email" id="email" placeholder="Insert here the email of the post" aria-describedby="helpId">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <label for="oggetto" class="form-label mb-2 text-secondary"><strong> inserisci la tua oggetto</strong> </label>
        <input value="{{old('oggetto')}}" class="form-control @error('oggetto') is-invalid @enderror mb-4" type="text" name="oggetto" id="oggetto" placeholder="Insert here the oggetto of the post" aria-describedby="helpId">
        @error('oggetto')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror





        <label for="messaggio" class="form-label text-secondary"><strong>messaggio</strong> </label>
        <textarea class="form-control @error('messaggio') is-invalid @enderror" type="text" name="messaggio" id="messaggio" placeholder="Insert here the messaggio of the post" aria-describedby="helpId">{{old('messaggio')}}</textarea>
        <small>Make sure you don't exceed 2000 characters, spaces included.</small>
        @error('messaggio')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>




    </div>



    <div class="d-flex justify-content-center mb-3">
        <button type="submit" class="btn btn-success text-white">invia</button>
    </div>


</form>

@endsection
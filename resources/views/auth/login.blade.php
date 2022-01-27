<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login</title>
</head>

<body class="vh-100">
    <div class="container_login w-100 h-100 position-relative">
        <div class="header w-100 d-flex justify-content-between">
            <img class="logo" src="{{asset('img/logo_tg.png')}}" alt="">
            <a href="{{route('guest.index')}}"><i class="fas fa-times text-white fs-1"></i></a>
        </div>
        <div class="col-md-8 m-auto position-absolute top-50 start-50 translate-middle">
            <div class="card bg-transparent border-0 text-center ">
                <div class="card-header bg-transparent border-0 text-center text-white m-auto">
                    <h2>Accedi al tuo Account</h2>
                </div>
                <div class="card-body m-auto row d-flex flex-column">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="email" class="col-md-4 col-form-label text-primary">Email</label>

                            <div>
                                <input id="email" type="email" class="form-control rounded-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="col-md-4 col-form-label text-primary">Password</label>

                            <div>
                                <input id="password" type="password" class="form-control rounded-0 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-center w-100">
                            <div>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>

                        </div>


                        <div class="form-group row mb-0 m-auto">
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))

                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>







    </div>





</body>

</html>

@section('content')

@endsection
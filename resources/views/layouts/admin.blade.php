<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app" class="vh-100">
        <div>
            <aside class="float-start">
                <div class="admin_control text-center p-2 text-white"><strong>ADMIN CONTROL</strong> </div>
                <div class="container_admin text-white mt-3">
                    <i class="fas fa-user-shield"></i> Admin
                </div>
                <ul>
                    <li class="{{ Route::currentRouteName() === '' ? 'active' : 'inactive' }}"><i class="fas fa-home me-2"></i><a href="{{route('guest.index')}}">Homepage</a></li>
                    <li><a href="{{route('admin.posts.index')}}">post</a></li>
                    @auth

                    <div class="logout text-white" aria-labelledby="navbarDropdown">
                        <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    @endauth
                </ul>
            </aside>
        </div>

        <div class="container-fluid">

            <main class="">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
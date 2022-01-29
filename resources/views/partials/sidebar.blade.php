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
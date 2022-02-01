<aside class="float-start">
    <div class="admin_control text-center p-2 text-white"><strong>ADMIN CONTROL</strong> </div>
    <div class="container_admin text-white mt-3">
        <i class="fas fa-user-shield"></i> Admin
    </div>
    <ul>
        <li class="{{ Route::currentRouteName() === '' ? 'active' : 'inactive' }}"><i class="fas fa-home me-2"></i><a href="{{route('guest.index')}}">Homepage</a></li>
        <li class="{{ Route::currentRouteName() === 'admin.posts.index' ? 'active' : 'inactive' }}"><a href="{{route('admin.posts.index')}}"><i class="fas fa-newspaper me-2"></i>Post</a></li>
        <li class="{{ Route::currentRouteName() === 'admin.categories.index' ? 'active' : 'inactive' }}"><a href="{{route('admin.categories.index')}}"><i class="far fa-sticky-note me-2"></i>Category</a></li>
        <li class="{{ Route::currentRouteName() === 'admin.tags.index' ? 'active' : 'inactive' }}"><a href="{{route('admin.tags.index')}}"><i class="fas fa-tag me-2"></i>Tags</a></li>

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
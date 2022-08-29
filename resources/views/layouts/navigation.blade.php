<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        @if(Route::has("login"))
            @auth
                <li class="nav-item mr-3">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->name}}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item active">Logout</button>
                            </form>
                        </ul>
                    </div>
                </li>
            @else
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('login')}}" class="nav-link">Log in</a>
                </li>
                @if(Route::has('register'))
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{route('register')}}" class="nav-link">Register</a>
                    </li>
                @endif
            @endauth
        @endif
    </ul>
</nav>

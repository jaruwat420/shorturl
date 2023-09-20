<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">ShortUrl</a>
        <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="#">Home</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="{{ route('admin.index') }}">Dashboard</a>
                    </li>                 
                @else
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="{{ route('register') }}">Register</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

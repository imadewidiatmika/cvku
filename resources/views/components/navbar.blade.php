<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ">
    <div class="container p-3 ">
        <a href="/home" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img src="../../img/cvku.svg" width="150" height="40" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="toggler-icon top-bar"></span>
            <span class="toggler-icon middle-bar"></span>
            <span class="toggler-icon bottom-bar"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{ $slot }}
        </div>
        @auth
        <div class="dropdown text-end">
            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle px-4" data-bs-toggle="dropdown" aria-expanded="false">
            Selamat datang, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        <i class="fas fa-fw fa-sign-out"></i>
                        Keluar
                    </button>
                </form>
            </ul>
        </div>
        @else
        <div class="col-md-3 text-end">
            <a href="/login"><button type="button" class="btn btn-outline-primary me-2">Login</button></a>
            <a href="/register"><button type="button" class="btn btn-primary">Sign-up</button></a>
        </div>
        @endauth
    </div>
</nav>

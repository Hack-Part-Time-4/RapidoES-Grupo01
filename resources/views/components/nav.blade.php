<nav class="navbar navbar-expand-lg  backgroundNavbar navText ">
    <div class="container-fluid ">
        <a class="navbar-brand navText" href="{{route ('home')}}">RapidoES</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-center ">
                <li class="nav-item">
                    <a class="nav-link  navText" aria-current="page" href="{{route ('home')}}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navText" href="{{route ('categories')}}">Categorías</a>
                </li>


                @guest

                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link loginColor" href="{{route ('login')}}">Entrar</a>
                </li>
                @endif
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link loginColor" href="{{route ('register')}}">Registrarse</a>
                </li>
                <li class="nav-item">
                    <x-locale lang="es" country="es" />
                </li>
                <li class="nav-item">
                    <x-locale lang="en" country="gb" />
                </li>
                <li class="nav-item">
                    <x-locale lang="it" country="it" />
                </li>
                @endif

                @else

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ads.create') }}">Añadir anuncio</a>
                </li>

                <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark bg-primary">
                        @if (Auth::user()->is_revisor == 1)
                        <li><a class="dropdown-item" href="{{ Route('revisor.home') }}">Revisor --
                                <span class="badge rounded-pill bg-danger">{{ \App\Models\Ad::adCount() }}</span></a>
                        </li>
                        @endif

                        <li><a class="dropdown-item" href="#">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-warning"> Logout </button>
                                </form>
                            </a></li>

                    </ul>
                </div>

                <div>
                    <form action="{{ route('search') }}" method="GET" class="d-flex" role="search">
                        <input class="form-control me-2 text-warning" type="search" placeholder="Search" aria-label="Search" name="q">
                        <button class="btn btn-outline-dark text-white" type="submit">Search</button>
                    </form>
                </div>





                @endguest

            </ul>

        </div>
    </div>
</nav>
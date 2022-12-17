<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route ('home')}}">RapidoES</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route ('home')}}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route ('categories')}}">Categorías</a>
                </li>
                
                @guest
                
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{route ('login')}}">Entrar</a>
                </li>
                @endif
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{route ('register')}}">Registrarse</a>
                </li>
                @endif

                @else

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ads.create') }}">Añadir anuncio</a>
                </li>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-warning"> Logout </button>
                </form>

                @endguest

            </ul>

        </div>
    </div>
</nav>
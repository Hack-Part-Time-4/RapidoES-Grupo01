<nav class="navbar navbar-expand-lg backgroundNavbar">


    <div class="container-fluid me-md-5 ">

        <a class="navbar-brand text-white" href="{{route ('home')}}">RapidoES</a>

        <button class="navbar-toggler border-white" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="bi bi-list text-white"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto ms-md-5 my-3">
                <li class=" text-center mx-3">
                    <a class="nav-link  text-white" aria-current="page" href="{{route ('home')}}">{{__('Inicio')}}</a>
                </li>
                <li class=" text-center mx-3">
                    <a class="nav-link text-white" href="{{route ('categories')}}">{{__('Categorías')}}</a>
                </li>
                <li class="text-center mx-3">
                    <a class="nav-link text-white" href="{{ route('ads.create') }}">{{__('Nuevo anuncio')}}</a>
                </li>
            </ul>

            <div class="">
                <form action="{{ route('search') }}" method="GET" role="search" class="d-flex justify-content-between">
                    <input class="form-control ms-md-5 ms-3 me-2 w-75 text-center" type="search"
                        placeholder="{{__('¿Qué buscas?')}}" aria-label="Search" name="q">
                    <button class="btn btn-outline-light p-1 me-md-5" type="submit">{{__('Buscar')}}</button>
                </form>
            </div>

            <div class="d-flex justify-content-evenly mx-md-5 my-3">
                @guest

                @if (Route::has('login'))
                <a class="nav-link loginColor me-2 mx-md-3" href="{{route ('login')}}">{{__('Entrar')}}</a>
                @endif


                @if (Route::has('register'))
                <a class="nav-link loginColor ms-2 mx-md-3" href="{{route ('register')}}">{{__('Registrar')}}</a>
                @endif


                @else

                <div class="dropdown">
                    <button class="btn btn-outline-light {{-- navText --}} dropdown-toggle me-3" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>

                    <ul class="dropdown-menu dropdown-menu-dark backgroundNavbar">

                        @if (Auth::user()->is_revisor == 1)
                        <li><a class="dropdown-item" href="{{ Route('revisor.home') }}">{{__('Pendientes')}} <i
                                    class="bi bi-arrow-right-short"></i>
                                <span
                                    class="badge rounded-pill bg-danger border border-white">{{ \App\Models\Ad::adCount() }}</span></a>
                        </li>
                        @endif


                        <li>
                            <a class="dropdown-item" href="#">
                                <form action="{{ route('logout') }}" method="POST"
                                    class="d-flex justify-content-center">
                                    @csrf
                                    <button type="submit" class="bg-danger rounded-pill border border-white text-white">
                                        {{__('Salir')}} </button>
                                </form>
                            </a>
                        </li>
                    </ul>
                </div>
                @endguest
            </div>
            <div class="d-flex justify-content-between justify-content-md-end">
                <a class="mx-md-4" href="">
                    <x-locale lang="es" country="es" />
                </a>

                <a class="{{-- me-md-2 --}}" href="">
                    <x-locale lang="en" country="gb" />
                </a>
            </div>
        </div>
    </div>
</nav>

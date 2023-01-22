<nav class="navbar navbar-expand-lg  backgroundNavbar navText ">


    <div class="container-fluid">
        <a class="navbar-brand navText" href="{{route ('home')}}">RapidoES</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-center ">
                <li class="nav-item">
                    <a class="nav-link  navText" aria-current="page" href="{{route ('home')}}">{{__('Inicio')}}</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link navText" href="{{route ('categories')}}">{{__('Categorías')}}</a>
                </li>

                <li class="">
                    <a class="nav-link text-white" href="{{ route('ads.create') }}">{{__('Nuevo anuncio')}}</a>
                </li>

                <div>
                    <form action="{{ route('search') }}" method="GET" role="search" class="d-flex justify-content-end">
                        <input class="form-control me-1 " type="search" placeholder="{{__('¿Qué buscas?')}}" aria-label="Search"
                            name="q">
                        <button class="btn btn-outline-light" type="submit">{{__('Buscar')}}</button>
                    </form>
                </div>

                <div class="d-flex justify-content-end">
                    <a class="" href="">
                        <x-locale lang="es" country="es" />
                    </a>

                    <a class="" href="">
                        <x-locale lang="en" country="gb" />
                    </a>
                </div>
                @guest

               
                    
                @if (Route::has('login'))
                    <a class="nav-link loginColor" href="{{route ('login')}}">{{__('Entrar')}}</a>
                @endif
                  
                   
                @if (Route::has('register'))
                    <a class="nav-link loginColor" href="{{route ('register')}}">{{__('Registrar')}}</a>
                @endif
                  

                @else

                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle me-3" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>

                    <ul class="dropdown-menu dropdown-menu-dark backgroundNavbar">

                        @if (Auth::user()->is_revisor == 1)
                        <li><a class="dropdown-item" href="{{ Route('revisor.home') }}">{{__('Pendientes')}} <i
                                    class="bi bi-arrow-right-short"></i>
                                <span class="badge rounded-pill bg-danger">{{ \App\Models\Ad::adCount() }}</span></a>
                        </li>
                        @endif


                        <li><a class="dropdown-item" href="#">
                                <form action="{{ route('logout') }}" method="POST"
                                    class="d-flex justify-content-center">
                                    @csrf
                                    <button type="submit" class="bg-danger rounded-pill"> {{__('Salir')}} </button>
                                </form>
                            </a></li>
                    </ul>

                </div>

                @endguest
            </ul>

        </div>
    </div>






</nav>

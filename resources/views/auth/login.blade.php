<x-layout>

    <x-slot name="title">Rapido - Login</x-slot>

    <section class="vh-100">

        <div class="container-fluid my-3">

            <div class="row d-flex justify-content-center align-items-center h-100">

                <div class="col-lg-12 col-xl-11">

                    <div class="card textCard" style="border-radius: 25px;">

                        <div class="card-body">

                            <div class="row d-flex justify-content-center">

                                <div class="col-md-9 col-lg-6 col-xl-4 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-1 mx-1 mx-md-4 mt-4">{{__('Iniciar sesión')}}</p>
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    <form class="mx-1 mx-md-4 form-control" action="/login" method="POST" role="form">
                                        @csrf

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" name="email" id="email" class="form-control"
                                                    placeholder="{{__('Tu correo')}}" />
                                            </div>
                                            {{-- <div class="validate"></div> --}}
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" name="password" id="password"
                                                    class="form-control" placeholder="{{__('Tu contraseña')}}" />
                                            </div>
                                            {{-- <div class="validate"></div> --}}
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg">{{__('Entrar')}}</button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                        class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
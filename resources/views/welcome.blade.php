<x-layout>
    <x-slot name='title'>Rapido - Homepage</x-slot>

    @forelse ($ads as $ad)

    <div class="container">
        <div class="row justify-content-center mt-5">
                <div class="col-12 col-md-4 ">
                    <div class="card" style="width: 18rem;">
                        <img src="https://picsum.photos/150" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title pb-2">{{$ad->title}}</h5>

                            <h5 class="card-subtitle pb-2 text-primary">{{$ad->category->name}}</h5>

                            <p class="card-text">{{$ad->body}}</p>

                            <div class="d-flex justify-content-between pb-3">
                                <h5 class="card-subtitle">€{{$ad->price}}</h5>
                                <h5 class="card-subtitle">{{$ad->created_at->format('d/m/Y')}}</h5>
                            </div>

                            <div class="card-subtitle">
                                <small>{{$ad->user->name}}</small>
                            </div>


                            <div class="text-center">
                                <a href="#" class="btn btn-primary">Ver Más</a>
                            </div>

                        </div>
                    </div>
                </div>
            
        </div>
    </div>

    @empty

    <div class="col-md-8">
        <h2>No se encontro nada</h2>
        <a href="{{ route('ads.create') }}" class="btn btn-primary">Vender tu objeto</a>
        <a href="{{ route('home') }}" class="btn btn-primary">Vuelve al inicio</a>
    </div>

    @endforelse ($ads as $ad)


</x-layout>
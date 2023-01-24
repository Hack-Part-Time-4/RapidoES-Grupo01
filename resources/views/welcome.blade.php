<x-layout>
    <x-slot name='title'>Rapido - {{__('Inicio')}}</x-slot>

    <div class="container mt-3">
        <div class="row my-3">
            <div class="col-12 text-center ">
                <h1>{{__('Bienvenidos a nuestro portal de anuncios')}}</h1>
            </div>
        </div>
        <div class="row ">
            @forelse ($ads as $ad)

            {{-- https://picsum.photos/150 --}}

            <div class="col-12 col-md-3 d-flex justify-content-center">

                <div class="card my-3 backgroundCard" style="width: 18rem;">
                    @if ($ad->images()->count() > 0)
                    <img src="{{$ad->images()->first()->getUrl(400,300)}}" class="card-img-top img-fluid"
                    alt="...">
                    @else
                        <img src="https://picsum.photos/150" class="card-img-top img-fluid" alt="">
                    @endif
                    
                    <div class="card-body ">
                        <h5 class="card-title text-center border-bottom p-3 border-primary">{{$ad->title}}</h5>

                        <p class="card-text text-center">{{$ad->body}}</p>

                        <h5 class="text-center">€{{$ad->price}}</h5>
                        
                        <div class="d-flex justify-content-between mt-2">
                            <small>{{$ad->created_at->format('d/m/Y')}}</small>
                            <small>{{$ad->user->name}}</small>
                        </div>

                        <div class="d-flex justify-content-between mt-2">
                            <a href="{{ route('category.ads',$ad->category) }}"
                                    class="btn btn-outline-primary">{{$ad->category->name}}</a>
                            <a href="{{ route("ads.show", $ad) }}" class="btn btn-outline-primary">{{__('Ver Más')}}</a>
                        </div>
                        
                    </div>
                </div>
            </div>

            @empty

            <div class="col-md-8">
                <h2>{{__('Uyy.. parece que no hay nada')}}</h2>
                <a href="{{ route('ads.create') }}" class="btn btn-primary">{{__('Vende tu primer objeto')}}</a>
                <a href="{{ route('home') }}" class="btn btn-primary">{{__('Vuelve al inicio')}}</a>
            </div>

            @endforelse ($ads as $ad)
        </div>
    </div>



</x-layout>
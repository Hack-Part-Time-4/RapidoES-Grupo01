<x-layout>
    <x-slot name='title'>Rapido - {{ $category->name }}</x-slot>
    <div class="container mt-3">
        <div class="row mb-5">
            <div class="col-12">
                <h1>Anuncios por categoria: {{ $category->name }}</h1>
            </div>
        </div>
        <div class="row">
            @forelse ($ads as $ad)

           {{--  @if ($ad->images()->count() > 0)
            <img src="{{$ad->images()->first()->getUrl(400,300)}}" class="card-img-top"
            alt="...">
            @else
                <img src="https://picsum.photos/150" class="card-img-top" alt="">
            @endif --}}

            <div class="col-12 col-md-4 mb-5">
                <div class="card" style="width: 18rem;">
                    @if ($ad->images()->count() > 0)
                        <img src="{{$ad->images()->first()->getUrl(400,300)}}" class="card-img-top" alt="...">
                    @else
                        <img src="https://picsum.photos/150" class="card-img-top" alt="">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title pb-2">{{$ad->title}}</h5>

                        <div class="card-subtitle pb-2 text-primary">
                            <a href="{{ route('category.ads',$ad->category) }}"
                                class="btn btn-info">{{$ad->category->name}}</a>
                        </div>

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


            @empty

            <div class="col-md-8">
                <h2>No se encontro nada en esta categoría</h2>
                <a href="{{ route('ads.create') }}" class="btn btn-primary">Vender tu objeto</a>
                <a href="{{ route('home') }}" class="btn btn-primary">Vuelve al inicio</a>
            </div>

            @endforelse ($ads as $ad)
            {{$ads->links()}}
        </div>
    </div>


</x-layout>
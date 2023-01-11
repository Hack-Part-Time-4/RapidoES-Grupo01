<x-layout>
    <x-slot name='title'>Rapido - Homepage</x-slot>
    @if ($ad)
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-4 ">
                
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        
                        <h5 class="card-title pb-2">Anuncio #{{$ad->id}}</h5>
                        <hr>

                        <p class="card-text">Titulo: <b> {{$ad->title}} </b></p>
                        <p class="card-text">Descripción: <b> {{$ad->body}} </b></p>
                        <p class="card-text">Precio: <b> {{$ad->price}} </b></p>
                        <p class="card-text">Categoria: <b> {{$ad->category->name}} </b></p>
                        <p class="card-text">Fecha de creación: <b> {{$ad->created_at->format('d/m/Y')}} </b></p>

                    </div>
                    <hr>
                    <div class="d-flex justify-content-between pb-3">
                        <form action="{{ route('revisor.ad.accept',$ad) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success">ACEPTAR</button>
                        </form>
                        <form action="{{ route('revisor.ad.reject',$ad) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger">RECHAZAR</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @else
        <h1 class="text-center mt-5">NO HAY ANUNCIOS POR REVISAR !</h1>
    @endif
    

</x-layout>
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
                        <div class="row">
                            <div class="col-12">
                                <p>Imágenes:</p>
                                <div class="col">
                                    @forelse ($ad->images as $image)
                                    <div class="col-12 col-md-4 border border-dark">
                                        <img src="{{ $image->getUrl(400,300) }}" alt="" class="img-fluid">
                                        
                                    </div>
                                    <div class="col-md-8">
                                        <b> Adult: </b><i class="bi bi-circle-fill {{$image->adult}}"></i><br> [{{$image->adult}}] <br>
                                        <b> Spoof: </b><i class="bi bi-circle-fill {{$image->spoof}}"></i><br> [{{$image->spoof}}] <br>
                                        <b>Medical: </b><i class="bi bi-circle-fill {{$image->medical}}"></i><br> [{{$image->medical}}] <br>
                                        <b>Violence: </b><i class="bi bi-circle-fill {{$image->violence}}"></i><br> [{{$image->violence}}] <br>
                                        <b>Racy: </b><i class="bi bi-circle-fill {{$image->racy}}"></i><br> [{{$image->racy}}] <br>

                                        <b>id: </b>{{$image->id}} <br>
                                        <b>path: </b>{{$image->path}} <br>
                                        <b>url: </b>{{Storage:: url($image->path)}} <br>
                                    </div>
                                    @empty
                                    <div class="col-12 col-md-4 border border-dark">
                                        <b>No hay imágenes</b>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                            
                        </div>
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
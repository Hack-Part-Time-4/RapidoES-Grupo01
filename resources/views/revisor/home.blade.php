<x-layout>
    <x-slot name='title'>Rapido - Homepage</x-slot>
    @if ($ad)
    <div class="container-fluid">

        <div class="row mt-5">

            <div class="col-12 d-flex justify-content-center">

                <div class="card backgroundCard " style="width: 70rem;">

                    <div class="row">
                        <div class="col-12 col-md-8 offset-md-2">
                            <div class="card backgroundCard">
                                <div class="card-header">
                                    Anuncio #{{$ad->id}}
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p>Imágenes:</p>
                                        </div>
                                        <div class="col-9">
                                            <div class="row">
                                                @forelse ($ad->images as $image)
                                                <div class="col-md-4">
                                                    <img src="{{ $image->getUrl(400,300) }}" alt="" class="img-fluid ">
                                                </div>

                                                <div class="col-md-9 row">
                                                    <b>Adult:</b><i
                                                        class="bi bi-circle-fill {{$image->adult}}">[{{$image->adult}}]</i>
                                                    <b>Spoof:</b><i class="bi bi-circle-fill {{$image->spoof}}">
                                                        [{{$image->spoof}}]</i>
                                                    <b>Medical:</b><i class="bi bi-circle-fill {{$image->medical}}">
                                                        [{{$image->medical}}]</i>
                                                    <b>Violence:</b><i class="bi bi-circle-fill {{$image->violence}}">
                                                        [{{$image->violence}}]</i>
                                                    <b>Racy:</b><i class="bi bi-circle-fill {{$image->racy}}">
                                                        [{{$image->racy}}]</i>
                                                </div>
                                                <div class="col-md-9">
                                                    <br>
                                                    <b>Labels</b><br>
                                                    @forelse ($image->getLabels() as $label)
                                                    <a href="#"
                                                        class="btn btn-sm m-1 backgroundNavbar text-white">{{ $label }}</a>
                                                    @empty
                                                    No labels
                                                    @endforelse
                                                    <br>
                                                    <b>id: </b>{{$image->id}} <br>
                                                    <b>path: </b>{{$image->path}} <br>
                                                    <b>url: </b>{{Storage:: url($image->path)}} <br>
                                                </div>
                                                @empty
                                                <div class="border border-dark w-auto mb-3 ms-2">
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
                                    <p class="card-text">Fecha de creación: <b> {{$ad->created_at->format('d/m/Y')}}
                                        </b></p>

                                </div>

                                <div class="d-flex justify-content-evenly mb-3">
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
            </div>

        </div>
    </div>
    @else
    <h1 class="text-center mt-5">NO HAY ANUNCIOS POR REVISAR !</h1>
    @endif
</x-layout>

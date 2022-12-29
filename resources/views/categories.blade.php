<x-layout>
    <x-slot name='title'>Rapido - Categorías</x-slot>

    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <h1>Listado de categorías</h1>
            </div>
        </div>
    </div>

    @forelse ($cats as $cat)
    <div class="container">
        <div class="row justify-content-center mt-4">
                <div class="list-group">
                    <a href="{{ route('category.ads',$cat) }} "
                        class="list-group-item list-group-item-primary btn btn-primary p-4" >
                        {{ $cat->name }}
                    </a>
                </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
</x-layout>
<x-layout>
    <x-slot name='title'>Rapido - {{__('Categorías')}}</x-slot>


    <h1 class="text-center mt-3">{{__('Listado de categorías')}}</h1>


    @forelse ($cats as $cat)
    <div class="list-group m-auto my-3 w-50">
        <a href="{{ route('category.ads',$cat) }} "
            class="btn loginColor backgroundNavbar decoracionNo">
            {{ $cat->name }}
    </a>
    </div>
    @empty
    @endforelse
</x-layout>

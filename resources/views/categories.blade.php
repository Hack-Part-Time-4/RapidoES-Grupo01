<x-layout>
    <x-slot name='title'>Rapido - {{__('Categorías')}}</x-slot>


    <h1 class="text-center mt-3">{{__('Listado de categorías')}}</h1>


    @forelse ($cats as $cat)
    <div class="list-group my-3 mx-5">
        <a href="{{ route('category.ads',$cat) }} "
            class="{{-- list-group-item list-group-item-primary --}} btn btn-primary">
            {{ $cat->name }}
        </a>
    </div>
    @empty
    @endforelse
</x-layout>

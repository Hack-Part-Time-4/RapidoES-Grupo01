<x-layout>
    <h1 class="text-center mt-5">EN MANTENIMIENTO .....</h1>
    <div class="text-center mt-5">
    <img src="{{asset ('imgs/mant.png')}}" width="25%" alt="">
    </div>

    @forelse ($cats as $cat)
    <ul>
        <li>{{ $cat->name }}</li>
    </ul>
    @empty
        
    @endforelse
</x-layout>
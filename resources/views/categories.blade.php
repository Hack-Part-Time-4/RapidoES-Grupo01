<x-layout>

    @forelse ($cats as $cat)
    <div class="container">
        <div class="row justify-content-center mt-4">
                <div class="list-group">
                    <a href="{{ route('category.ads',$cat) }}"
                        class="list-group-item list-group-item-primary  text-center" >
                        {{ $cat->name }}
                    </a>
                </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
</x-layout>
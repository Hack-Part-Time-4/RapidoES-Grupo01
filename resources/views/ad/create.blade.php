<x-layout>
    <x-slot name="title">
        Rapido - Añadir anuncio
    </x-slot>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card text-bg-info border-dark ">
                    <div class="card-header text-center">
                        <h4>Nuevo anuncio</h4>
                    </div>
                    <div class="card-body">
                      <livewire:create-ad />
                    </div>
                  </div>
            </div>
        </div>
    </div>
</x-layout>
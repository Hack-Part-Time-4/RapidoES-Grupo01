<x-layout>
    <x-slot name="title">
        Rapido - {{__('Añadir anuncio')}}
    </x-slot>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-9">
                <div class="card text-white backgroundNavbar ">
                    <div class="card-header text-center border-bottom border-white">
                        <h4 class="">{{__('Nuevo anuncio')}}</h4>
                    </div>
                    <div class="card-body">
                      <livewire:create-ad />

                    </div>
                  </div>
            </div>
        </div>
    </div>

</x-layout>
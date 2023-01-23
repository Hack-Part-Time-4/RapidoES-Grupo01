<div>
    @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
    @endif


    <form wire:submit.prevent="store">
        @csrf
        <div class="mb-3">
            <label for="category" class="form-label">{{__('Categoría')}}: </label>
            <select wire:model.defer="category" class="form-control">
                <option value="">Seleccionar categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">{{__('Título')}}: </label>
            <input wire:model="title" type="text"  class="form-control @error('title')
                is-invalid @enderror"> 
                @error('title')
                    {{$message}}
                @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">{{__('Descripción')}}: </label> <br>
            <textarea wire:model="body" cols="80" rows="8" class="form-control @error('body')
            is-invalid @enderror"> </textarea>
            @error('body')
                {{$message}}
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">{{__('Precio')}}: </label>
            <input wire:model="price" type="number"  class="form-control @error('price')
            is-invalid @enderror"> 
            @error('price')
                {{$message}}
            @enderror
        </div>

        <div class="mb-3">
            <input wire:model="temporary_images" type="file" name="images" multiple class="form-control shadow @error('temporary_images.*')
            is-invalid @enderror"> 
            @error('temporary_images.*')
               <p class="text-danger mt-2">{{$message}}</p> 
            @enderror
        </div>

        @if (!empty($images))
                <p>{{__('Vista previa')}}:</p>
                <div class="row">
                    @foreach ($images as $key=>$image)

                    <div class="col-md-2 d-flex row align-content-center container-fluid">

                        <div class="d-flex justify-content-center">
                            <img src="{{ $image->temporaryUrl() }}" alt="" class="img-fluid">
                        </div>
                            
                        <div class="d-flex justify-content-center mt-1 mb-3">
                            <button type="button" class="btn btn-danger" wire:click="removeImage({{$key}})">{{__('Eliminar')}}</button>
                        </div>
                            
                    </div>    
                    @endforeach
                </div>
        @endif
        <div class="d-flex justify-content-center border-top border-white mt-3">
            <button type="submit" class="btn btn-outline-light mt-3">{{__('Crear')}}</button>
        </div>
        
    </form>
</div>
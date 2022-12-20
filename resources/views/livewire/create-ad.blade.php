<div>
    <form wire:submit.prevent="store">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titulo</label>
            <input wire:model="title" type="text"  class="form-control"> 

        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Descipción</label>
            <textarea wire:model="body" cols="105" ></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Precio</label>
            <input wire:model="price" type="number"  class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
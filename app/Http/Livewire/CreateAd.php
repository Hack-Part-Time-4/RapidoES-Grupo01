<?php

namespace App\Http\Livewire;

use App\Jobs\ResizeImage;
use Livewire\Component;
use App\Models\Ad;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;

class CreateAd extends Component
{
    use WithFileUploads;
    
    public $title;
    public $body;
    public $price;
    public $category;
    public $images = [];
    public $temporary_images;
    public $image;

    protected $rules = [
        'title' => 'required|min:4',
        'body' => 'required|min:4',
        'price' => 'required|numeric',
        'category' => 'required',
    ];

    protected $messages = [
        'required'=>'Campo :attribute es obligatorio, por favor rellenalo',
        'min'=>'Campo :attribute la cantidad tiene que ser mayor que :min',
        'numeric'=>'Campo :attribute el precio tiene que ser un numero'
    ];

// FORMA ANTIGUA
    /* public function store()
    {
        $category = Category::find($this->category);
        $ad =  $category ->ads()->create([
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
        ]);

        Auth::user()->ads()->save($ad);
 */

        // luego de añadir la relacion : categoria - anuncio
        /* $category ->ads()->create([
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
        ]); */

        // Primera forma antes de añadir la relacion : categoria - anuncio
        /* Ad::create([
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
            'category' => $this->category;
        ]); */
    /*     session()->flash('message','Anuncio creado');
        $this->cleanForm();
    } */

// FORMA NUEVA
public function store()
    {
        // VALIDAMOS LOS DATOS

        $validateData = $this->validate();

        // BUSCAMOS LA CATEGORIA

        $category = Category::find($this->category);

        // CREAMOS EL ANUNCIO SEGUN LA CATEGORIA

        $ad =  $category ->ads()->create($validateData);

        // GUARDAMOS EL ANUNCIO JUNTO CON EL USUARIO
        Auth::user()->ads()->save($ad);

        // GUARDAMOS CADA IMAGEN LA DB
        if (count($this->images)) {
            $newFileName = "ads/$ad->id";
            foreach ($this->images as $image) {
                $newImage = $ad->images()->create([
                    'path'=>$image->store($newFileName,'public')
                ]);
                dispatch(new ResizeImage($newImage->path,400,300));
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        session()->flash('message','Anuncio creado');
        $this->cleanForm();
    }

    public function cleanForm()
    {
        $this->title="";
        $this->body="";
        $this->price="";
        $this->category="";
        $this->images=[];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.create-ad');
    }

    public function updatedTemporaryImages()
    {
        if ($this->validate(['temporary_images.*'=>'image|max:2048'])) {
            foreach ($this-> temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key,array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

}

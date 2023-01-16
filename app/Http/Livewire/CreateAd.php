<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Ad;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
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


    public function store()
    {
        $category = Category::find($this->category);
        $ad =  $category ->ads()->create([
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
        ]);

        Auth::user()->ads()->save($ad);


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
        session()->flash('message','Anuncio creado');
        $this->cleanForm();
    }

    public function cleanForm()
    {
        $this->title="";
        $this->body="";
        $this->price="";
        $this->category="";
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

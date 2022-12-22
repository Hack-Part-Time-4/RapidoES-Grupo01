<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Ad;
use App\Models\Category;

class CreateAd extends Component
{
    
    public $title;
    public $body;
    public $price;
    public $category;

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
        $category ->ads()->create([
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
        ]);
        /* Ad::create([
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
            'category' => $this->category;
        ]); */
        session()->flash('message','Anuncio creado pete');
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

}

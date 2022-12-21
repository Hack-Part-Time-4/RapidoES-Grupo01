<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Ad;

class CreateAd extends Component
{
    
    public $title;
    public $body;
    public $price;

    protected $rules = [
        'title' => 'required|min:4',
        'body' => 'required|min:4',
        'price' => 'required|numeric',
    ];

    protected $messages = [
        'required'=>'Campo :attribute es obligatorio, por favor rellenalo',
        'min'=>'Campo :attribute la cantidad tiene que ser mayor que :min',
        'numeric'=>'Campo :attribute el precio tiene que ser un numero'
    ];


    public function store()
    {
        Ad::create([
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
        ]);
        session()->flash('message','Anuncio creado pete');
        $this->cleanForm();
    }

    public function cleanForm()
    {
        $this->title="";
        $this->body="";
        $this->price="";
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

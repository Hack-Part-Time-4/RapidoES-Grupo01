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
        'title' => 'Requiere |min:4',
        'body' => 'Requiere min:8',
        'price' => 'Requiere numeric',
    ];

    protected $messages = [
        'required'=>'Campo :el titulo es obligatorio, por favor rellenalo',
        'min'=>'Campo :la cantidad tiene que ser mayor que :min',
        'numeric'=>'Campo :el precio tiene que ser un numero'
    ];


    public function store()
    {
        Ad::create([
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
        ]);
        $this->cleanForm();
    }

    public function cleanForm()
    {
        $this->title="";
        $this->body="";
        $this->price="";
    }

    /* public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    } */

    public function render()
    {
        return view('livewire.create-ad');
    }

}

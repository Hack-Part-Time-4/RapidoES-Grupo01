<?php
namespace App\Http\Livewire;
use App\Models\Ad;
use Livewire\Component;
class CreateAd extends Component
{
    public $title;
    public $body;
    public $price;

    public function store()
    {
        dd('llega el metodo store');
        Ad::create([
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price,
        ]);
    }

    public function render()
    {
        return view('livewire.create-ad');
    }
}
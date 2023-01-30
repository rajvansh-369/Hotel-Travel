<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BedroomType extends Component
{
    public $hotel;

    public function render()
    {
        return view('livewire.bedroom-type');
    }
}

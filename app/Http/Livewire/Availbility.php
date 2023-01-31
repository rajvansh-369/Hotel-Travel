<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Availbility extends Component
{

    public $hotel;
    public $startDate;
    public $endtDate;
    public $userID;
    public $hotelId;
    public $test;
    public $BedroomPrice;

    
    public function priceCalc(){

        dd($this->startDate,$this->endtDate,$this->userID,$this->hotelId,$this->BedroomPrice ,$this->test);
    }

    public function render()
    {
        return view('livewire.availbility');
    }



}

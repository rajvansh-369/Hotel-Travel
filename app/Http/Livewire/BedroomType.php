<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Listing;
use Carbon\Carbon;

class BedroomType extends Component
{
    public $hotel;
    public $days;
    protected $listeners = ['mount'];

    public function mount(){
        if(session('startDate') && session('endDate')){
            $startDate = Carbon::createFromFormat('m/d/Y', session('startDate'));
            $endtDate = Carbon::createFromFormat('m/d/Y', session('endDate'));
            $this->days =  $endtDate->diffInDays($startDate);
            // dd(session('startDate'), session('endDate'), $this->days , session()->all());
        }
    }

    public function render()
    {
        return view('livewire.bedroom-type');
    }

}

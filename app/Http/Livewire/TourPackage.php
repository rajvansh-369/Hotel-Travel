<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use App\Models\TourPackage as ModelTourPackage;
use Livewire\Component;

class TourPackage extends Component
{

    public $tourPackages, $getTourPackages, $searchText, $locations =[];

    public function mount(){

        $this->getTourPackages = new ModelTourPackage();

        $this->tourPackages = $this->getTourPackages->get();
        // dd( $this->tourPackages );
    
       }


    public function render()
    {
        return view('livewire.tour-package');
    }
}

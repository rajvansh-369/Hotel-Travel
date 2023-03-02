<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use App\Models\Testimonial;
use App\Models\TourPackage as ModelTourPackage;
use Livewire\Component;

class TourPackage extends Component
{

    public $tourPackages, $getTourPackages, $searchText, $testimonials, $locations =[];

    public function mount(){

        $this->getTourPackages = new ModelTourPackage();

        $this->tourPackages = $this->getTourPackages->get();
        // $this->testimonials = Testimonial::all();
        // dd( $this->tourPackages );
    
       }


    public function render()
    {
        return view('livewire.tour-package');
    }
}

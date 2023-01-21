<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use Livewire\Component;

class HotelSearch extends Component
{

    public $hotels, $getHotels, $searchText, $locations =[];
   
   public function mount(){

    $this->getHotels = new Listing; 
    $this->hotels = $this->getHotels->get();
    foreach($this->hotels as $hotel){


        $location['lat'] = (double)$hotel->address->lat;
        $location['lng'] = (double)$hotel->address->lng;
        $location['listing_id'] = (double)$hotel->address->listing_id;
        $this->locations[] = $location;
    }

   }
   
    public function render()
    {
        return view('livewire.hotel-search');
    }


    public function search(){


        $this->hotels = $this->getHotels->where('name' , 'like', '%'.$this->searchText.'%' )->get();


        foreach($this->hotels as $hotel){


            $location['lat'] = (double)$hotel->address->lat;
            $location['lng'] = (double)$hotel->address->lng;
            $location['listing_id'] = (double)$hotel->address->listing_id;
            $this->locations[] = $location;
        }
        
    }
}

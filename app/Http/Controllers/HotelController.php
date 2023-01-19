<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Listing;
use App\Models\Picture;
use Illuminate\Http\Request;

class HotelController extends Controller
{
   

    public function index(){


        

            // $addr = Picture::get()->toArray();

            // return  ($addr);
        
        $hotels = Listing::get();
        
        $location = [];
        foreach($hotels as $hotel){


            $location['lat'] = (double)$hotel->address->lat;
            $location['lng'] = (double)$hotel->address->lng;
            $location['listing_id'] = (double)$hotel->address->listing_id;
            $locations[] = $location;
        }
        // dd(json_encode($locations));

        return view('pages.home' ,compact('hotels' , 'locations'));
    }
    
    
    public function hotel_details($id){

        $hotel = Listing::where('id', $id)->first();

        return view('pages.hotel-details' ,compact('hotel'));
    }
   
    public function hotels(){

        $hotels = Listing::get();

        return view('pages.hotels' ,compact('hotels'));
    }
   
   
    public function contact(){

        return view('pages.contact');
    }
}

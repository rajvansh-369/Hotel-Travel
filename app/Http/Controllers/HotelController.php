<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class HotelController extends Controller
{
   

    public function index(){


        $hotels = Listing::get();
        return view('pages.home' ,compact('hotels'));
    }
    
    
    public function hotels(){



        $hotels = Listing::get();
        return view('pages.hotels' ,compact('hotels'));
    }
   
   
    public function contact(){

        return view('pages.contact');
    }
}

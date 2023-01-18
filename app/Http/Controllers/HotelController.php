<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelController extends Controller
{
   

    public function index(){

        return view('pages.home');
    }
    
    
    public function hotels(){

        return view('pages.hotels');
    }
   
   
    public function contact(){

        return view('pages.contact');
    }
}

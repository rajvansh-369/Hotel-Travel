<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListingController extends Controller
{

   
    public function index(){
        return view('pages.home');
    }

    public function hotels(){
        return view('pages.hotels');
    }

    public function contact(){

        dd(uuid_create());
        return view('pages.contact');
    }

    
}

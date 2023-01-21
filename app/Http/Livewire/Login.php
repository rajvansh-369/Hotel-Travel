<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RalphJSmit\Livewire\Urls\Facades\Url;

class Login extends Component
{

    public  $email, $password , $remember_token ;



    public function render()
    {
        return view('livewire.login');
    }

    protected $rules = [
        'email' => 'required',
        'password' => 'required|',
    ];

    public function login(){

                $url = url()->previous();
               $arrUrl = explode("/" ,$url);
        $this->validate();
            $checkEmail = User::where('email' , $this->email)->first();
            if(!$checkEmail){
                return    session()->flash('message', 'Email does not match Please Register.');      
            }

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            // $this->session()->regenerate();

            if( $arrUrl[3]  == "hotel-details"){

                return redirect(route('hotel-details', $arrUrl[4]));
            }else{


                return redirect(route('home'));
            }
        }
        return  session()->flash('message', 'Invalid Password.');


   
    }
}

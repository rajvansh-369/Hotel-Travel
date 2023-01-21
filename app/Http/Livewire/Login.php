<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

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


        $this->validate();

            $checkEmail = User::where('email' , $this->email)->first();

            if(!$checkEmail){

                return    session()->flash('message', 'Email does not match Please Register.');

                
            }

            // dd(Auth::attempt($credentials));
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            // $this->session()->regenerate();

            return redirect(route('home'));
        }
        return  session()->flash('message', 'Invalid Password.');


   
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ForgetPassword extends Component
{


    public $name, $email, $password , $password_confirmation;



    protected $rules = [
        'email' => 'required|email|exists:users,email',
        'password' => 'required|confirmed',
    ];


    public function reset_password(){

        $this->validate();
        
        // dd("test");

        User::where('email', $this->email)->update([
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message', 'Password Reset Successfully.');

    }


    public function render()
    {
        return view('livewire.forget-password');
    }
}

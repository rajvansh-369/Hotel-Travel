<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{

    public $name , $email, $password , $password_confirmation;

    
        protected $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ];
    
    
        public function create(){
    
            $this->validate();

            
         $user =   User::create(

              [  'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),]
            );
                // dd(Auth::attempt(['email' => $user->email, 'password' => $this->password]), $this->password, $user->email);
            session()->flash('message', 'User Created successfully.');

            if(\Auth::attempt(['email' => $user->email, 'password' => $this->password])) {
               
                // dd("ttest");
                // session()->regenerate();
    
                // return redirect()->intended('home');
                return redirect(route('home'));;
            }
    
        }

    public function render()
    {
        return view('livewire.register');
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
   
    

    public function loginView(){

        if(auth()->user()){

            return redirect()->back();
      }

        return view('auth.login');


    }
  
    public function logout(){

        Session::flush();
        
        Auth::logout();

        return redirect('/');
       
    }
   
    public function registerView(){

        if(auth()->user()){

            return redirect()->back();
      }
      
        return view('auth.register');
    }
  
  
  
    // public function authLogin(Request $request){

    //         $credentials = $request->validate([
    //                 'email' => ['required', 'email'],
    //                 'password' => ['required'],
    //                 // 'remember_me' => 'boolean',
    //             ]);

    //                 $checkEmail = User::where('email' , $request->email)->first();

    //                 dd($checkEmail);
    //                 if(!$checkEmail){
    //                     return back()->withErrors([
    //                         'email' => 'Email does not match Please Register.',
    //                     ])->onlyInput('email');
    //                 }

    //             if (Auth::attempt($credentials)) {
    //                 $request->session()->regenerate();
        
    //                 return redirect()->intended('home');
    //             }
        
    //             return back()->withErrors([
    //                 'password' => 'Invalid Password.',
    //             ])->onlyInput('password');


    // }



   
}

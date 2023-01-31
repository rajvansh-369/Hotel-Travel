<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function redirect()
    {

        // dd("Test");
        return Socialite::driver('google')->redirect();
    }
        
    public function callback()
    {
        try {
      
            $user = Socialite::driver('google')->user();

            // dd( $user->id );
       
            $finduser = User::where('google_id', $user->id)->first();
       
            if ( $finduser ) {
       
                Auth::login($finduser);
      
                return redirect()->intended('/');
       
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => Hash::make('123456')// you can change auto generate password here and send it via email but you need to add checking that the user need to change the password for security reasons

                ]);
      
                Auth::login($newUser);
      
                return redirect()->intended('/');
            }
      
        } catch (Exception $e) {

            return redirect(route('loginView'))->withErrors(['message' =>'End Date should be greater than Start Date']);
            
            dd($e->getMessage());
        }
    }

}

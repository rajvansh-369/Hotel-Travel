<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use Livewire\Component;

class MyBooking extends Component
{
    public $banner;
    public $bookings;
    public $user;
    public $name;
    public $email;
    public $address;
    public $phone;
    public $user_id;
    public $city;
    public $state;
    public $country;

   public function mount(){

    $this->banner = Banner::where('status',1)->orderBy('id' ,'desc')->first();

    $this->user = auth()->user();
    $this->name = $this->user->name ?? $this->name;
    $this->email =$this->user->email;
    $this->address =$this->user->address ?? $this->address;
    $this->phone =$this->user->phone ?? $this->phone;
    $this->bookings = $this->user->UserBookings;
    $this->user_id = $this->user->id;
    $this->city = $this->user->userAddress->city ?? $this->city;
    $this->state = $this->user->userAddress->state ?? $this->state;
    $this->country = $this->user->userAddress->country ?? $this->country;


   }

   public function render()
   {

    return view('livewire.my-booking');
   }
   public function updateProfile(){
    $this->user->name = $this->name;
    $this->user->email = $this->email;
    $this->user->address = $this->address;
    $this->user->phone = $this->phone;
    $this->user->userAddress->user_id = $this->user_id;
    $this->user->userAddress->city = $this->city;
    $this->user->userAddress->state = $this->state;
    $this->user->userAddress->country = $this->country;
    $this->user->save();
    $this->user->userAddress->save();

    session()->flash('message', 'User successfully updated.');
   }

}

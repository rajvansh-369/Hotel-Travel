<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Listing;
use App\Models\Picture;
use App\Models\TimexEvents;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HotelController extends Controller
{
   

    public function index(){


        

            // $addr = Picture::get()->toArray();

            // return  ($addr);
        
        $hotels = Listing::get();
        
        $location = [];
        foreach($hotels as $hotel){


            $location['lat'] = (double)$hotel->address->lat;
            $location['lng'] = (double)$hotel->address->lng;
            $location['listing_id'] = (double)$hotel->address->listing_id;
            $locations[] = $location;
        }
        // dd(json_encode($locations));

        return view('pages.home' ,compact('hotels' , 'locations'));
    }
    
    
    public function hotel_details($id){

        $hotel = Listing::where('id', $id)->first();

        $location = [];
 


            $location['lat'] = (double)$hotel->address->lat;
            $location['lng'] = (double)$hotel->address->lng;
            $location['listing_id'] = (double)$hotel->address->listing_id;
            
     
            // dd($location);

        return view('pages.hotel-details' ,compact('hotel', 'location'));
    }
   
    public function hotels(){

        $hotels = Listing::get();
        $location = [];
        foreach($hotels as $hotel){


            $location['lat'] = (double)$hotel->address->lat;
            $location['lng'] = (double)$hotel->address->lng;
            $location['listing_id'] = (double)$hotel->address->listing_id;
            $locations[] = $location;
        }

        return view('pages.hotels' ,compact('hotels', 'locations'));
    }
   
   
    public function contact(){

        return view('pages.contact');
    }


    public function preBooking(Request $request){


        if(!auth()->user()){

              return redirect(route('loginView'));
        }
        
        // ->format('M d, Y')
        // ->format('M d, Y')
        $startDate = Carbon::createFromFormat('m/d/Y', $request->startDate);
        $endtDate = Carbon::createFromFormat('m/d/Y', $request->endtDate);

            $totalTime =  $endtDate->diffInDays($startDate);

        // dd($totalTime,$startDate, $request->startDate ,  $endtDate,  $request->endtDate)  ;
        $hotel = Listing::find($request->hotelId);
        $user = User::find($request->userID);
        $subject = "Hotel ". $hotel->name." Booking";
        $body = "<p>Booking of ". $hotel->name." from ".$request->endtDate." to ".$request->endtDate." from ".$user->name."</p>";
        $data = [
            // 'id' => uuid_create(),
            'totalTime' =>$totalTime,
            'userID' => $request->userID,
            'hotelId' => $request->hotelId,
            'attachments' => [],
            'body' => $body,
            'category' => 'success',
            'formattedEnd' => $endtDate->format('M d, Y'),
            'endTime' => $hotel->full_day_end_time,
            'isAllDay' => 1,
            'organizer' => $user->id,
            'participants' => [$user->id],
            'subject' => $subject,
            'formattedStart' => $startDate->format('M d, Y'),
            'startTime' => $hotel->full_day_start_time,
            'startDate' => $startDate->format('Y-m-d'),
            'endDate' =>$endtDate->format('Y-m-d'),
            'user_id' => $request->userID,
            'lisitng_id' => $request->hotelId,

        ];

        session(['data'=> $data]);
        // dd($data);
       
        

            return    redirect(route('booking'));
        // return view('pages.booking', compact('data'));
    }

    public function booking(){

        
        if(!auth()->user()){

            return redirect(route('loginView'));
      }

      if(!session('data')){

        return redirect()->back();
  }

        $bookingData =   session('data');
        $hotel = Listing::with('address')->find($bookingData['hotelId']);
        $user = User::find($bookingData['userID']);
        $discountPrice = ($hotel->price_per_day )*($hotel->full_discount_rate /100);
        $sale_tax = ($hotel->price_per_day )*($hotel->sale_tax /100);
        $calculateTotalPrice = number_format((($hotel->price_per_day * $bookingData['totalTime']) +($hotel->price_per_day )*($hotel->sale_tax /100)  ) - ($discountPrice), 2) ;
        
        session(['totalPrice'=>  $calculateTotalPrice]);
        // dd($calculateTotalPrice);

        
        return view('pages.booking', compact('hotel', 'user', 'bookingData', 'discountPrice', 'calculateTotalPrice', 'sale_tax'));
    
    }
   
   
   
    public function confirmBooking(){

        if(!auth()->user()){

            return redirect(route('loginView'));
      }
        if(!session('data')){

            return redirect()->back();
      }



        $data =   session('data');
        $totalPrice =   session('totalPrice');

        // dd($data);
       
        $booked = TimexEvents::create([
                'id' => uuid_create(),
                'attachments' => "[]",
                'body' => $data['body'],
                'category' => 'success',
                'endTime' => '11:45:00',
                'end' => $data['endDate'],
                'isAllDay' => 1,
                'organizer' => $data['organizer'],
                'participants' => json_encode($data['participants']),
                'subject' => $data['subject'],
                'startTime' => '12:00:00',
                'start' => $data['startDate'],
                'totalPrice' => $totalPrice,
                'user_id' => $data['user_id'],
                'lisitng_id' => $data['lisitng_id'],

            ]);

            session()->flush();
            dd($booked);
        
        
        return view('pages.thank-you');
    
    }

}

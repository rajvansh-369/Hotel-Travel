<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Banner;
use App\Models\Listing;
use App\Models\Picture;
use App\Models\TimexEvents;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
class HotelController extends Controller
{
   

    public function index(){


        

            // $addr = Picture::get()->toArray();

            // return  ($addr);
        
        $hotels = Listing::where('status',1)->get();
        $banner = Banner::where('status',1)->orderBy('id' ,'desc')->first();



        $location = [];
        foreach($hotels as $hotel){

            // dd($hotel);
            $location['lat'] = (double)$hotel->address->lat;
            $location['lng'] = (double)$hotel->address->lng;
            $location['listing_id'] = (double)$hotel->address->listing_id;
            $location['hotel_name'] = (string)$hotel->name;
            $locations[] = $location;
        }
        // dd(json_encode($locations));

        return view('pages.home' ,compact('hotels' , 'locations' , 'banner'));
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
        $banner = Banner::where('status',1)->orderBy('id' ,'desc')->first();
        $location = [];
        foreach($hotels as $hotel){


            $location['lat'] = (double)$hotel->address->lat;
            $location['lng'] = (double)$hotel->address->lng;
            $location['listing_id'] = (double)$hotel->address->listing_id;
            $locations[] = $location;
        }

        return view('pages.hotels' ,compact('hotels', 'locations', 'banner'));
    }
   
    public function searchHotels(Request $request){

        $fromDate = $request->fromDate;
        $toDate = $request->toDate;
        $adult = $request->adult;
        $child = $request->child;
        
        session(['fromDate'=> $fromDate]);
        session(['toDate' => $toDate]);
        session(['adult'=> $adult]);
        session(['child'=> $child]);

            if( $toDate < $fromDate){


                return redirect()->back()->withErrors(['error' =>'End Date should be greater than Start Date']);
            }

        // dd(session()->all(), $request->all());
        return response()->json("Sucess");
    }
  
  
    public function searchResult(Request $request){

        $fromDate = session('fromDate');
        $toDate = session('toDate');
        $adult = session('adult');
         $child =  session('child'); 
                
         $data = [

            'fromDate' => $fromDate,
            'toDate' => $toDate,
            'adult' => $adult,
            'child' => $child,
         ];

        //  return $data;
        
        // dd($data);
        $hotels = Listing::where('adult','>=', $adult)->orderBy('adult' , 'desc')->get();
        // dd($hotels); 
        // return $hotels;


        $location = [];
        foreach($hotels as $hotel){


            $location['lat'] = (double)$hotel->address->lat;
            $location['lng'] = (double)$hotel->address->lng;
            $location['listing_id'] = (double)$hotel->address->listing_id;
            $locations[] = $location;
        }

        return view('pages.searchHotels' ,compact('hotels', 'locations', 'data' ));
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
            'category' => 'secondary',
            'formattedEnd' => $endtDate->format('M d, Y'),
            'endTime' => $hotel->full_day_end_time,
            'isAllDay' => 1,
            'organizer' => 1,
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

    public function booking(Request $request){


        // dd(session('data'));
        if(!auth()->user()){

            return redirect(route('loginView'));
      }

      if(session('data') == null){

        return redirect(route('home'))->with('alert','Booking Session Expired');
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
   
   
   
    public function confirmBooking(Request $request){

        if(!auth()->user()){

            return redirect(route('loginView'));
      }
      if(session('data') == null){

        return redirect(route('home'));
     }

      



        $data =   session('data');
        $totalPrice =   session('totalPrice');

           


        $hotel = Listing::find($data['lisitng_id']);
        $user = User::find($data['user_id']);
       
        $booked = TimexEvents::create([
                'id' => uuid_create(),
                'attachments' => "[]",
                'body' => $data['body'],
                'category' => 'secondary',
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
            // $request->session()->flush();
            $request->session()->forget('data');
            $request->session()->forget('totalPrice');
            // session()->flush();
            // dd($booked->created_at);
            $invoiceDate = Carbon::createFromFormat('Y-m-d H:i:s', $booked->created_at)->format('M d, Y');
            // dd(session()->flush(), session()->all(),);
            // dd($booked);
        
        
        return view('pages.thank-you' ,  compact('hotel' , 'user' , 'booked' , 'invoiceDate'));
    
    }

}

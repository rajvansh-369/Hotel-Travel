<?php

namespace App\Http\Controllers;

use App\Mail\Booking;
use App\Models\Address;
use App\Models\Banner;
use App\Models\Listing;
use App\Models\Picture;
use App\Models\TimexEvents;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

            $location['lat'] = (double)$hotel->address->lat;
            $location['lng'] = (double)$hotel->address->lng;
            $location['listing_id'] = (double)$hotel->address->listing_id;
            $location['hotel_name'] = (string)$hotel->name;
            $locations[] = $location;
        }

        return view('pages.home' ,compact('hotels' , 'locations' , 'banner'));
    }


    public function hotel_details($id){

        $hotel = Listing::where('id', $id)->with('bedrooms')->first();
        $location = [];
        $location['lat'] = (double)$hotel->address->lat;
        $location['lng'] = (double)$hotel->address->lng;
        $location['listing_id'] = (double)$hotel->address->listing_id;

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
    public function tour(){

        $hotels = Listing::get();
        $banner = Banner::where('status',1)->orderBy('id' ,'desc')->first();
        $location = [];
        foreach($hotels as $hotel){


            $location['lat'] = (double)$hotel->address->lat;
            $location['lng'] = (double)$hotel->address->lng;
            $location['listing_id'] = (double)$hotel->address->listing_id;
            $locations[] = $location;
        }

        return view('pages.tour' ,compact('hotels', 'locations', 'banner'));
    }








    public function bedroomsPrice(Request $request){

        $hotelData = $request->hotel;
        $bedroomTypePrice = $request->bedroomTypePrice;
        $price_per_day = $request->price_per_day;

        // dd($hotelData);


            $startDate = Carbon::createFromFormat('m/d/Y', $request->startDate);
            $endtDate = Carbon::createFromFormat('m/d/Y',   $request->endDate);


            $days =  $endtDate->diffInDays($startDate);

            if($bedroomTypePrice  == ""){


                $PriceCalc = $price_per_day * $days;
            }else{

                $PriceCalc = $bedroomTypePrice * $days;

            }

            session([
                'startDate' => $startDate->format('m/d/Y'),
                'endDate' =>$endtDate->format('m/d/Y'),
                'priceWithoutTax' =>$PriceCalc
        ]);

            return $PriceCalc;
    }

    public function searchHotels(Request $request){

        $startDate = $request->fromDate;
        $endDate = $request->toDate;
        $adult = $request->adult;
        $child = $request->child;

        session(['startDate'=> $startDate]);
        session(['endDate' => $endDate]);
        session(['adult'=> $adult]);
        session(['child'=> $child]);

            if( $endDate < $startDate){


                return redirect()->back()->withErrors(['error' =>'End Date should be greater than Start Date']);
            }

        // dd(session()->all(), $request->all());
        return response()->json("Sucess");
    }


    public function searchResult(Request $request){

        $startDate = session('startDate');
        $endDate = session('endDate');
        $adult = session('adult');
         $child =  session('child');

         $data = [

            'startDate' => $startDate,
            'endDate' => $endDate,
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

        $banner = Banner::where('status',1)->orderBy('id' ,'desc')->first();
        return view('pages.searchHotels' ,compact('hotels', 'locations', 'data' , 'banner'));
    }



    public function contact(){

        $banner = Banner::where('status',1)->orderBy('id' ,'desc')->first();

        return view('pages.contact', compact('banner'));
    }


    public function preBooking(Request $request){

        if(!auth()->user()){

              return redirect(route('loginView'));
        }

        $startDate = Carbon::createFromFormat('m/d/Y', $request->startDate);
        $endDate = Carbon::createFromFormat('m/d/Y', $request->endDate);

            $totalTime =  $endDate->diffInDays($startDate);


        $hotel = Listing::find($request->hotelId);
        $user = User::find($request->userID);
        $subject = "Hotel ". $hotel->name." Booking";
        $body = "<p>Booking of ". $hotel->name." from ".$request->startDate." to ".$request->endDate." from ".$user->name."</p>";
        $data = [

            'totalTime' =>$totalTime,
            'userID' => $request->userID,
            'hotelId' => $request->hotelId,
            'attachments' => [],
            'body' => $body,
            'category' => 'secondary',
            'formattedEnd' => $endDate->format('M d, Y'),
            'endTime' => $hotel->full_day_end_time,
            'isAllDay' => 1,
            'organizer' => 1,
            'participants' => [$user->id],
            'subject' => $subject,
            'formattedStart' => $startDate->format('M d, Y'),
            'startTime' => $hotel->full_day_start_time,
            'user_id' => $request->userID,
            'lisitng_id' => $request->hotelId,

        ];

        session([
            'data'=> $data,
            'startDate' => $startDate->format('m/d/Y'),

            'endDate' =>$endDate->format('m/d/Y'),
            'bedroomPrice' =>$request->bedroomPrice,
    ]);
        // dd($data);



            return    redirect(route('booking'));
        // return view('pages.booking', compact('data'));

    }

    public function booking(Request $request){

        if(!auth()->user()){

            return redirect(route('loginView'));
      }

      if(session('data') == null){

        return redirect(route('home'))->with('alert','Booking Session Expired');
     }

        $bookingData =   session('data');
        $hotel = Listing::with('address')->find($bookingData['hotelId']);
        $user = User::find($bookingData['userID']);

        $discountPrice = ( session('priceWithoutTax') ?? $hotel->price_per_day )*($hotel->full_discount_rate /100);
        $sale_tax = ( session('priceWithoutTax') ?? $hotel->price_per_day )*($hotel->sale_tax /100);
        $calculateTotalPrice = (( session('priceWithoutTax') ?? $hotel->price_per_day * $bookingData['totalTime']) +( session('priceWithoutTax') ?? $hotel->price_per_day )*($hotel->sale_tax /100)  ) - ($discountPrice);


        session(['totalPrice'=>  $calculateTotalPrice]);
        session(['discountPrice'=>  $discountPrice]);
        session(['sale_tax'=>  $sale_tax]);

        return view('pages.booking', compact('hotel', 'user', 'bookingData', 'discountPrice', 'calculateTotalPrice', 'sale_tax'));

    }



    public function confirmBooking(Request $request){

        if(!auth()->user()){

            return redirect(route('loginView'));
      }
        if(session('data') == null){

            return redirect(route('home'));
        }
    $getEventTable = new TimexEvents();

    $getInvoiceId =  $getEventTable->latest()->first()?->invoice_no;

        if($getInvoiceId == null){
            $invoiceNo = "BODH0001";
        }else{
            $int_var = (int)filter_var($getInvoiceId, FILTER_SANITIZE_NUMBER_INT);
            $invoiceNo  = "BODH000".$int_var+1;
       
       
        }
// dd($getInvoiceId);

        $data =   session('data');
        $startDate = Carbon::createFromFormat('m/d/Y', session('startDate'));
        $endDate = Carbon::createFromFormat('m/d/Y', session('endDate'));
        $totalTime =  $endDate->diffInDays($startDate);


        $startDate = Carbon::createFromFormat('m/d/Y', session('startDate'))->format('Y-m-d');
        $endDate = Carbon::createFromFormat('m/d/Y', session('endDate'))->format('Y-m-d');

        $totalPrice =   session('totalPrice');
        $discountPrice =   session('discountPrice');
        $sale_tax =   session('sale_tax');


        // dd(session()->all());


        $hotel = Listing::find($data['lisitng_id']);
        $user = User::find($data['user_id']);
        $startDate = Carbon::createFromFormat('m/d/Y', session('startDate'));
        $endtDate = Carbon::createFromFormat('m/d/Y', session('endDate'));
        // $booked  = TimexEvents::find('e3d00317-949d-4058-9b29-a429481381be');


        $booked = $getEventTable->create([

                'id' => uuid_create(),
                'attachments' => [],
                'body' => $data['body'],
                'category' => 'secondary',
                'endTime' => '11:45:00',
                'end' => $endDate,
                'isAllDay' => 1,
                'organizer' => $data['organizer'],
                'participants' => ($data['participants']),
                'subject' => $data['subject'],
                'startTime' => '12:00:00',
                'start' => $startDate,
                'totalPrice' => $totalPrice,
                'invoice_no' =>  $invoiceNo,
                'user_id' => $data['user_id'],
                'listing_id' => $data['lisitng_id'],

            ]);

            // dd( $booked);
            // $request->session()->flush();
            $request->session()->forget('data');
            $request->session()->forget('startDate');
            $request->session()->forget('endDate');
            $request->session()->forget('adult');
            $request->session()->forget('child');
            $request->session()->forget('priceWithoutTax');
            $request->session()->forget('totalPrice');

            $request->session()->forget('bedroomPrice');
            // session()->flush();
            // dd($booked->created_at);
            $invoiceDate = Carbon::createFromFormat('Y-m-d H:i:s', $booked->created_at)->format('M d, Y');
            $invoiceDate = '2023-02-08 22:36:18';
            // dd(session()->flush(), session()->all(),);
            // dd($booked);


            // $invoiceDate = Carbon::createFromFormat('Y-m-d H:i:s', $booked->created_at)->format('M d, Y');

            Mail::to('snhlrj8@gmail.com')->send(new Booking($user,$hotel,$booked, $invoiceDate, $totalTime ,$discountPrice , $sale_tax , $totalPrice));

        return view('pages.thank-you' ,  compact('hotel' , 'user' , 'booked' , 'invoiceDate', 'totalTime', 'discountPrice' , 'sale_tax', 'totalPrice'));

    }


    public function myBooking(){

        return view('pages.myBooking');

    }

}

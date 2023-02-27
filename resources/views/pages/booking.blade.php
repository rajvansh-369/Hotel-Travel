@extends('layouts.app')
@section('content')
    {{-- {{dd(auth())}} --}}
    {{-- {{dd($bookingData, $user , $hotel)}} --}}
    <div class="header-top navBar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="d-flex justify-content-between flex-wrap align-items-center">
                        <div class="header-info-left">
                            {{-- <ul>
                            <li>Call Us: +10 (89) 675 5456</li>
                            <li>

                                <a href="">enquiry@hotel.com</a>

                            </li>
                        </ul> --}}
                        </div>
                        <div class="header-info-right d-none d-sm-block">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





<div class="booking-detail py-5">
    <div class="container">
        <h1 class="header">Booking Details</h1>
        <div class="row">
            <div class="col-md-6">
                <img src="{{asset('/storage/'.$hotel->picture[0]->picture)}}" class="img-fluid bd-img">
                <section class="address position-relative py-3">
                    <p class="locnm">{{$hotel->address->formatted_address}}</p>
                    <p class="tornt">{{$hotel->address->city}}, {{$hotel->address->state}}</p>
                    <p class="bechs">{{$hotel->postal_code}}</p>
                    <p class="locnm">Hotel name: <b>{{$hotel->name}}</b></p>
                </section>
            </div>
            <div class="col-md-6">
                <section class="payment-card">
                    <p class="date">{{$bookingData['formattedStart']}} -  {{$bookingData['formattedEnd']}}</p>
                    <p class="hours mb-5">
                        {{$bookingData['totalTime']}} Nights <br>
                        12:00 am -
                        11:00 pm
                    </p>
                    <div class="cost">
                        <div class="row justify-content-between">
                            <div class="col-md-3">
                                <p class="mb-0">Cost</p>
                            </div>
                            <div class="col-md-2">
                                <ul class="mb-0">
                                    <li>INR</li>
                                    <li><img src="{{asset('storage/inr_logo.webp')}}" style="max-width:25px;" class="img-fluid"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <ul class="hrs">
                        <li>
                           
                            {{$bookingData['formattedStart']}} -  {{$bookingData['formattedEnd']}}<br>(12:00 pm -
                            11:00 am)
                            {{$bookingData['totalTime']}} Nights <br></li>
                        <li>₹{{number_format(session('priceWithoutTax'), 2)}}</li>
                    </ul>
                    <ul class="discnt">
                        <li>Discount {{$hotel->full_discount_rate}}%</li>
                        <li><span class="price_card"> - ₹{{$discountPrice}}.00 </span></li>
                    </ul>
                    <ul class="discnt">
                        <li>TAX {{$hotel->sale_tax}}%</li>
                        <li>+ ₹{{$sale_tax}}.00</li>
                    </ul>
                    <hr>
                    <ul class="totlcost">
                        <li><strong>Total</strong></li>
                        <li><strong>₹{{$calculateTotalPrice}}</strong></li>
                    </ul>
                    <p class="paradetail">By continuing, you agree to Hotel’ <b><a style="text-decoration:none;color:black;" target="_blank" href="https://justboardrooms.com/terms-of-use/">Terms of Use</a></b> and
                        <b><a style="text-decoration:none;color:black;" target="_blank" href="https://justboardrooms.com/privacy-policy/">Privacy Policy</a></b>.<br><br> For details about cancellations, please read our <b><a style="text-decoration:none;color:black;" target="_blank" href="https://api.justboardrooms.com/api-PROD/terms.php">Cancellation Policy</a></b> within our <b><a style="text-decoration:none;color:black;" target="_blank" href="https://api.justboardrooms.com/api-PROD/terms.php">Member Agreement</a></b>. </p>
                   <a href="{{route('confirmBooking')}}"><button type="button" class="btn2 btn-primary" data-bs-toggle="modal" data-bs-target="#paymentModal">Confirm Booking</button> </a> 
                </section>

            </div>
        </div>
    </div>
@endsection

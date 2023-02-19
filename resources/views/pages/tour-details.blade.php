@extends('layouts.app')
@section('content')
    <main>
        <div class="slider-area hero-bg1   hero-overly">
            {{-- style="background-image: url({{ $banner ? asset('storage/' . $banner->banner) : asset('img/h1_hero.jpg') }});"> --}}
            <div class="single-slider  slider-height2 d-flex align-items-center" style="min-height: 0px !important;">
                <div class="container">
                    <div class="row justify-content-start ">
                        <div class="col-xl-7 col-lg-11">

                            <div class="hero-caption hero-caption3" style="padding-top: 0px !important;">
                                <h1>{{ $tour->tour_name }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container brdetailmain">

            <p class="gotosrchrslt "><i class="fa fa-angle-left"></i>
                <a href="https://hostdev2.justboardrooms.com/booking/public">
                    Back
                    <!--Top Rated Around You-->
                </a>
            </p>

            <div class="row justify-content-between">
                <div class="col-md-7 col-lg-8">
                    <section class="address position-relative py-3">

                        <h4>{{ $tour->tour_name }}</h4>


                    </section>
                    <section class="address position-relative py-3">

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <ul class="listnone check-circle">
                                    <li>Delhi</li>
                                    <li>Jaipur</li>
                                    <li>Agra</li>
                                    <li>Patna</li>
                                    <li>Nalanda</li>
                                </ul>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <ul class="listnone check-circle">
                                    <li>Rajgir</li>
                                    <li>
                                        Bodhgaya</li>
                                    <li>Varanasi</li>
                                    <li>Kushinagar</li>
                                    <li>Gorakhpur</li>
                                </ul>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <ul class="listnone check-circle">
                                    <li>Lumbii</li>
                                    <li>Balrampur</li>
                                    <li>Lucknow</li>
                                    <li>Delhi</li>

                                </ul>
                            </div>
                        </div>


                    </section>
                    <section class="address position-relative py-3 highlights">

                        <h4>HIGHLIGHTS</h4>

                        {!! html_entity_decode($tour->description, ENT_QUOTES, 'UTF-8') !!}

                    </section>

                    <h4>Gallery</h4>

                    <div class="container">
                        <div class="row forDesktopGallery">
                            {{-- <div class="col-lg-6 gallery_img "> --}}
                            <img src="{{ asset('storage/' . $tour->image) }}"
                                data-mdb-img="https://mdbcdn.b-cdn.net/img/Photos/Slides/1.webp" alt="Table Full of Spices"
                                class="w-100 mb-2 mb-md-4 shadow-1-strong rounded">

                            {{-- </div> --}}
                        </div>




                    </div>





                    <section class="house-rules">





                        <div class="modal fade" id="contacthostModal" tabindex="-1" aria-labelledby="loginPopLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body p-5">

                                        <p class="text-end mb-0"><button type="button" class="btn-close"
                                                data-bs-dismiss="modal" aria-label="Close"></button></p>

                                        <div class="row py-3">

                                            <div class="col-md-12">
                                                <h5 class="mb-0"></h5>
                                                <p class="popup text-muted">
                                                    <strong>Conference Room @ Workspace Bedford</strong><br>
                                                    <span style="color:#B7B7B7;">208-620 Nine Mile Drive, Bedford, NS,
                                                        Canada</span>
                                                </p>
                                            </div>
                                        </div>
                                        <input type="hidden" id="listingConversationId" value="0">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Your Message..."></textarea>

                                        <button type="button" class="btn btn-primary mt-3" onclick="sendmsg('119','286')"
                                            style="padding: 5px 20px; background-color: #ff671d; border-color: #ff671d;">SEND</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
              
              
                <div class="col-md-5 col-lg-4">

                    <div class="row">

                   
                    <div class="card text-dark bg-light mb-3 availability">
                        <div class="card-header">Included In Package </div>
                        <div class="card-body ">
                            <ul class="listnone" style="border: 1px solid #e6e8e8!important;">
                                <li><i class="fa fa-bed"></i>&nbsp;<span> Accommodation as per itinerarys</span>&nbsp;<i
                                        class="fa fa-check-circle-o" aria-hidden="true" style="color: #15ce15"></i></li>
                                <li><i class="fa fa-user"></i> Transportation for sightseeing <i
                                        class="fa fa-check-circle-o" aria-hidden="true" style="color: #15ce15"></i></li>
                                <li><i class="fa fa-gavel" aria-hidden="true"></i> Taxes and company charges <i
                                        class="fa fa-check-circle-o" aria-hidden="true" style="color: #15ce15"></i></li>
                                <li><i class="fa fa-cutlery"></i> Breakfast in Hotels <i class="fa fa-check-circle-o"
                                        aria-hidden="true" style="color: #15ce15"></i></li>
                                <li><i class="fa fa-plane" aria-hidden="true"></i> Airport Services <i
                                        class="fa fa-check-circle-o" aria-hidden="true" style="color: #15ce15"></i></li>
                                <li><i class="fa fa-tint" aria-hidden="true"></i> Mineral Waters <i
                                        class="fa fa-check-circle-o" aria-hidden="true" style="color: #15ce15"></i></li>
                                <li><i class="fa fa-motorcycle"></i> Other Activity <i class="fa fa-check-circle-o"
                                        aria-hidden="true" style="color: #15ce15"></i></li>
                            </ul>
                        </div>
                    </div>
              
                </div>
              
                    <div class="row">

                   
                    <div class="card text-dark bg-light mb-3 availability">
                        <div class="card-header">Included In Package </div>
                        <div class="card-body ">
                            <ul class="listnone" style="border: 1px solid #e6e8e8!important;">
                                <li><i class="fa fa-sign-in" aria-hidden="true"></i> Admission / Entry Tickets <i class="fa fa-times-circle" aria-hidden="true" style="color: red"></i></li>
                                   <li><i class="fa fa-usd" aria-hidden="true"></i> Personnel expenses <i class="fa fa-times-circle" aria-hidden="true" style="color: red"></i></li>
                                  <li><i class="fa fa-medkit" aria-hidden="true"></i> Travel Insurance <i class="fa fa-times-circle" aria-hidden="true" style="color: red"></i></li>
      <li><i class="fa fa-ticket" aria-hidden="true"></i> Flights Tickets <i class="fa fa-times-circle" aria-hidden="true" style="color: red"></i></li>
      <li><i class="fa fa-cutlery" aria-hidden="true"></i> Meals <i class="fa fa-times-circle" aria-hidden="true" style="color: red"></i></li>
      <li><i class="fa fa-credit-card" aria-hidden="true"></i> Visa  <i class="fa fa-times-circle" aria-hidden="true" style="color: red"></i></li>
      
                                  </ul> 
                        </div>
                    </div>
              
                </div>
              
                </div>


            
            </div>

        </div>

    </main>
@endsection

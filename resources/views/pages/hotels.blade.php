@extends('layouts.app')
@section('content')
    <main>
        {{-- {{dd($hotels)}} --}}

        {{-- TIMEX --}}


        <div class="slider-area hero-bg1  hero-overly" {{-- style="background-image: url({{  $banner ?   asset('storage/' . $banner->banner) : asset('img/h1_hero.jpg')  }});" --}}>
            <div class="single-slider  slider-height2 d-flex align-items-center" style="min-height: 0px !important;">
                <div class="container">
                    <div class="row justify-content-start ">
                        <div class="col-xl-7 col-lg-11">

                            <div class="hero-caption hero-caption2 pt-10" style="padding-top: 0px !important;">
                                <h1>Our Rooms</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @include('layouts.headerSearch') --}}

        </div>

        <div class="container-fluid location-house section-padding">
            <div class="row mx-auto">
                {{-- <div class="col-xl-2 col-lg-1 d-none d-md-block"></div> --}}
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12">

                                <div class="section-tittle mb-50">
                                    <h2>Search More Hotels Here</h2>
                                    {{-- <p>The concept and service of the best luxury hotels in BodhGaya in our sophisticated. --}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @livewire('hotel-search')
                    </div>




                </div>



                <div class="guest-house section-padding">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-8">
    
                                <div class="section-tittle text-center mb-50">
                                    <h2>We Offer to Our Guest</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 weOffers">
                                <div class="single-location mb-30">
                                    <img src="{{ asset('img/gallery/guest1.webp') }}" alt="">
                                    <div class="guest-contents guest-contents2">
                                        <h3><a href="#">European Plan</a></h3>
                                    </div>
                                    {{-- <div class="guest-contents">
                                        <h3><a href="#">European Plan</a></h3>
                                        <p>The concept and service of the best luxury hotels in Asturias in our sophisticated
                                            Urban
                                            Double and Unique Junior Suite rooms, with the possibility of enjoying a furnished
                                            terrace in our Double Urban Loft and Unique Junior Loft Suite.</p>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 weOffers">
                                <div class="single-location mb-30">
                                    <img src="{{ asset('img/gallery/guest2.jpg') }}" alt="">
                                    <div class="guest-contents guest-contents2">
                                        <h3><a href="#">Continental Plan</a></h3>
                                    </div>
                                    {{-- <div class="guest-contents">
                                        <h3><a href="#">Continental Plan</a></h3>
                                        <p>The concept and service of the best luxury hotels in Asturias in our sophisticated
                                            Urban
                                            Double and Unique Junior Suite rooms, with the possibility of enjoying a furnished
                                            terrace in our Double Urban Loft and Unique Junior Loft Suite.</p>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 weOffers">
                                <div class="single-location mb-30">
                                    <img src="{{ asset('img/gallery/guest3.webp') }}" alt="">
                                    <div class="guest-contents guest-contents2">
                                        <h3><a href="#">Modified American Plan</a></h3>
                                    </div>
                                    {{-- <div class="guest-contents">
                                        <h3><a href="#">Free Breakfast</a></h3>
                                        <p>The concept and service of the best luxury hotels in Asturias in our sophisticated
                                            Urban
                                            Double and Unique Junior Suite rooms, with the possibility of enjoying a furnished
                                            terrace in our Double Urban Loft and Unique Junior Loft Suite.</p>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 weOffers">
                                <div class="single-location mb-30">
                                    <img src="{{ asset('img/gallery/guest3.webp') }}" alt="">
                                    <div class="guest-contents guest-contents2">
                                        <h3><a href="#">American Plan</a></h3>
                                    </div>
                                    {{-- <div class="guest-contents">
                                        <h3><a href="#">Free Breakfast</a></h3>
                                        <p>The concept and service of the best luxury hotels in Asturias in our sophisticated
                                            Urban
                                            Double and Unique Junior Suite rooms, with the possibility of enjoying a furnished
                                            terrace in our Double Urban Loft and Unique Junior Loft Suite.</p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              


                <section class="client-say">
                    <div class="container">
                        <div class="custom-row">
                            <div class="client-active">
                                @if (count($testimonials) > 2)
                                    @forelse ($testimonials as  $testimonial)
                                        <div class="col-lg-5 col-md-6 col-sm-6">
                                            <div class="client-caption">
                                                <h3>{{ $testimonial->review_title }}</h3>
                                                <p>{{ $testimonial->review_desc }}</p>
    
                                                <div class="testimonial-founder d-flex align-items-center mt-30">
                                                    <div class="testimonialimg">
                                                        <img src="{{ asset('storage/' . $testimonial->image) }}"
                                                            class="img-fluid" alt="client-img">
                                                    </div>
                                                    <div class="founder-text mx-1">
                                                        <span> - {{ $testimonial->name }}</span>
                                                    </div>
                                                </div>
                                            </div>
    
                                        </div>
                                    @empty
                                        <div class="col-lg-5 col-md-6 col-sm-6">
                                            <div class="client-caption">
                                                <h3>Delicious Food</h3>
                                                <p>"Leather detail shoulder contrastic colour
                                                    contour stunning silhouette working peplum.
                                                    Statement buttons cover-up tweaks patch.</p>
    
                                                <div class="testimonial-founder d-flex align-items-center mt-30">
                                                    <div class="testimonialimg">
                                                        <img src="{{ asset('img/testiImg.png') }}" class="img-fluid"
                                                            alt="client-img">
                                                    </div>
                                                    <div class="founder-text mx-1">
                                                        <span>- Omeka Lotus</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-6 col-sm-6">
                                            <div class="client-caption">
                                                <h3>Nice Accommodation</h3>
                                                <p>"Leather detail shoulder contrastic colour
                                                    contour stunning silhouette working peplum.
                                                    Statement buttons cover-up tweaks patch.</p>
    
                                                <div class="testimonial-founder d-flex align-items-center mt-30">
                                                    <div class="testimonialimg">
                                                        <img src="{{ asset('img/testiImg.png') }}" class="img-fluid"
                                                            alt="client-img">
                                                    </div>
                                                    <div class="founder-text mx-1">
                                                        <span>- Omeka Lotus</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforelse
                                @else
                                    <div class="col-lg-5 col-md-6 col-sm-6">
                                        <div class="client-caption">
                                            <h3>Delicious Food</h3>
                                            <p>"Leather detail shoulder contrastic colour
                                                contour stunning silhouette working peplum.
                                                Statement buttons cover-up tweaks patch.</p>
    
                                            <div class="testimonial-founder d-flex align-items-center mt-30">
                                                <div class="testimonialimg">
                                                    <img src="{{ asset('img/testiImg.png') }}" class="img-fluid"
                                                        alt="client-img">
                                                </div>
                                                <div class="founder-text mx-1">
                                                    <span>- Omeka Lotus</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-6">
                                        <div class="client-caption">
                                            <h3>Nice Accommodation</h3>
                                            <p>"Leather detail shoulder contrastic colour
                                                contour stunning silhouette working peplum.
                                                Statement buttons cover-up tweaks patch.</p>
    
                                            <div class="testimonial-founder d-flex align-items-center mt-30">
                                                <div class="testimonialimg">
                                                    <img src="{{ asset('img/testiImg.png') }}" class="img-fluid"
                                                        alt="client-img">
                                                </div>
                                                <div class="founder-text mx-1">
                                                    <span>- Omeka Lotus</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-6">
                                        <div class="client-caption">
                                            <h3>Nice Accommodation</h3>
                                            <p>"Leather detail shoulder contrastic colour
                                                contour stunning silhouette working peplum.
                                                Statement buttons cover-up tweaks patch.</p>
    
                                            <div class="testimonial-founder d-flex align-items-center mt-30">
                                                <div class="testimonialimg">
                                                    <img src="{{ asset('img/testiImg.png') }}" class="img-fluid"
                                                        alt="client-img">
                                                </div>
                                                <div class="founder-text mx-1">
                                                    <span>- Omeka Lotus</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
    
    
                            </div>
                        </div>
                    </div>
                </section>

    </main>






    <script>
        function initMap() {


            var locationArr = @json($locations);

            console.log(locationArr.length);

            var mainCoords = locationArr[0];
            console.log(mainCoords.lat);

            var mapOptions = {
                center: {
                    lat: mainCoords.lat,
                    lng: mainCoords.lng
                },
                zoom: 13,
            };

            const map = new google.maps.Map(document.getElementById('map'), mapOptions);
            const icon = {
                url: @json(asset('/storage/map_pointer.png')), // url
                // url: "https://hostdev2.justboardrooms.com/Images/LocationPointer.png", // url
                scaledSize: new google.maps.Size(45, 65), // scaled size

            };
            var allMarkers = [];
            for (var i = 0; i < locationArr.length; i++) {
                var myCoords = locationArr[i];

                r = new google.maps.Marker({
                    position: myCoords,
                    map: map,
                    icon: icon,
                    url: @json(url('/hotel-details')) + '/' + myCoords.listing_id,
                });

                allMarkers.push(r);




            }

            allMarkers.map((marker) => {
                marker.addListener("click", () => {
                    window.open(marker.url, '_blank')
                })
            });
        }
    </script>

    {{-- <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSuy4U3KFAhhK1gtshBsDJIiKDnK16upg&libraries=places&callback=initMap">
    </script> --}}
@endsection

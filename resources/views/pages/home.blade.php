@extends('layouts.app')
@section('content')
    <div class="header-top navBarDetailPage">
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
                            {{-- <ul class="header-social">
                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main>
        {{-- {{dd($banner)}} --}}

        {{-- @include('layouts.headerSearch') --}}
        <div class="slider-area hero-bg1   hero-overly"
            style="background-image: url({{ $banner ? asset('storage/' . $banner->banner) : asset('img/h1_hero.jpg') }});">
            {{-- <img   src="../img/h1_hero.jpg" alt=""> --}}
            <div class="single-slider  slider-height1 d-flex align-items-center">
                <div class="container">
                    <div class="row justify-content-center ">
                        <div class="col-xl-7 col-lg-11">

                            <div class="hero-caption pt-10">
                                <h1>Rest Journey in Single step, in the breathtaking</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.headerSearch')

        </div>




        <div class="container-fluid location-house section-padding">
            <div class="row mx-auto">
                <div class="col-xl-1 col-lg-1 d-none d-md-block"></div>
                <div class="col-xl-7 col-lg-7 col-md-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-lg-9 col-md-12">

                                <div class="section-tittle mb-50">
                                    <h2>Top-rated around you</h2>
                                    <p>The concept and service of the best luxury hotels in BodhGaya in our sophisticated.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="slideproducts">
                        <div class="row">
                            <div class="container-fluid cardslider flex-wrap">

                                @foreach ($hotels as $hotel)
                                    <div class="col-md-4 col-sm-6  py-1 line-content">
                                        {{-- {{dd($loop->index)}} --}}
                                        <div class="card">
                                            <div id="carouselExampleIndicators{{ $loop->index }}" class="carousel slide"
                                                data-bs-interval="0" data-bs-ride="carousel">
                                                <a style="text-decoration: none;"
                                                    href="{{ route('hotel-details', $hotel->id) }}">
                                                    <div class="carousel-inner" style="height: 10rem">

                                                        @php $key = 0;@endphp
                                                        @foreach ($hotel->picture as $picture)
                                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                                <img src="{{ asset('/storage/' . $picture->picture) }}">

                                                            </div>

                                                            @php $key++;@endphp
                                                        @endforeach

                                                    </div>
                                                    @if (count($hotel->picture) > 1)
                                                        <button class="carousel-control-prev" type="button"
                                                            data-bs-target="#carouselExampleIndicators{{ $loop->index }}"
                                                            data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button"
                                                            data-bs-target="#carouselExampleIndicators{{ $loop->index }}"
                                                            data-bs-slide="next">
                                                            <span class="carousel-control-next-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
                                                    @endif
                                                </a>
                                                @if ($hotel->full_day_discount == 1)
                                                    <a class="discavl">DISCOUNT AVAILABLE</a>
                                                @endif


                                                {{-- <a class="pprpln"><i class="fa fa-paper-plane-o"
                                                        aria-hidden="true"></i>&nbsp;10724.7km</a> --}}



                                            </div>


                                            <div class="card-body" style="font-family: 'Myriad Pro Semibold';">
                                                <b>
                                                    <h1 class="card-title">{{ $hotel->name }} </h1>
                                                </b>


                                                <h5> {{ $hotel->address->formatted_address }}</h5>
                                                {{-- <h5 class="card-title">Conference Room @ Workspace Bedford</h5> --}}
                                                <p class="card-text mt-2">₹{{ $hotel->price_per_day }}
                                                    {{-- <div class="price">
                                                        <span>Started from<span>₹{{ $hotel->price_per_day }}</span></span>
                                                    </div> --}}



                                                </p>
                                                <ul class="fivestars m-0 p-0">
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                            <ul id="pagin">

                            </ul>
                        </div>
                    </div>

                </div>
                {{-- </div> --}}
                {{-- <div class="col-xl-4 col-lg-4 col-md-12">
                    <div id="map" style="height: 68rem; width:100%;">
                    </div>
                </div> --}}
            </div>







            <div class="support-company-area section-padding">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-xl-5 col-lg-6 col-md-10">
                            <div class="support-location-img mb-40">
                                <img src="{{ asset('img/gallery/about.webp') }}" alt="">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-8">
                            <div class="right-caption">
                                <div class="section-tittle">
                                    <h2>Luxury & Comfort Our services and wonders of Prague</h2>
                                </div>
                                <div class="support-caption">
                                    <p class="mb-10">The concept and service of the best luxury hotels in Asturias in our
                                        sophisticated Urban Double and Unique Junior Suite rooms, with the possibility of
                                        enjoying a furnished terrace in our Double Urban Loft and Unique Junior Loft Suite.
                                    </p>
                                    <a href="about.html" class="btn_01 about-btn">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4">
                            <div class="about-right-img d-none d-xl-block">
                                <img src="{{ asset('img/gallery/about-right.webp') }}" alt="" class="w-100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="location-house ">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-8">

                            <div class="section-tittle mb-50">
                                <h2>Our Rooms</h2>
                                <p>The concept and service of the best luxury hotels in Asturias in our sophisticated.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="rows">
                        <div class="location-active owl-carousel">
                            <div class="col-lg-12">

                                <div class="single-location">
                                    <img src="{{ asset('img/gallery/hotel1.webp') }}" alt="">
                                    <div class="location-contents">
                                        <h3><a href="#">Luxurious Room </a></h3>
                                        <p>2 Adult 1 Children</p>
                                        <div class="price">
                                            <span>Started from<span>$500</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">

                                <div class="single-location">
                                    <img src="{{ asset('img/gallery/hotel3.webp') }}" alt="">
                                    <div class="location-contents">
                                        <h3><a href="#">Family Room </a></h3>
                                        <p>2 Adult 1 Children</p>
                                        <div class="price">
                                            <span>Started from<span>$500</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">

                                <div class="single-location">
                                    <img src="{{ asset('img/gallery/hotel3.webp') }}" alt="">
                                    <div class="location-contents">
                                        <h3><a href="#">Couple Room </a></h3>
                                        <p>2 Adult 1 Children</p>
                                        <div class="price">
                                            <span>Started from<span>$500</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">

                                <div class="single-location">
                                    <img src="{{ asset('img/gallery/hotel2.webp') }}" alt="">
                                    <div class="location-contents">
                                        <h3><a href="#">Luxurious Room </a></h3>
                                        <p>2 Adult 1 Children</p>
                                        <div class="price">
                                            <span>Started from<span>$500</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="services-area2 section-padding">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-8">
                            <div class="section-tittle mb-60 text-center">
                                <h2>Surrounded by galleries, boutiques, restaurants and cafés, our Hotel is a hub of energy
                                    and style.</h2>
                                <a href="#" class="tittle-btn mt-15">Find a Room For You</a>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-10 col-lg-10">
                            <div class="col-xl-12">
                                <div class="single-services2 mb-30">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 p-0">
                                            <div class="features-img">
                                                <img src="{{ asset('img/gallery/project-img.webp') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 p-0">
                                            <div class="features-caption">
                                                <h3><a href="#">Take advantage of our seasonal specials.</a></h3>
                                                <p>The concept and service of the best luxury hotels in Asturias in our
                                                    sophisticated Urban Double and Unique Junior Suite rooms, with the
                                                    possibility of enjoying a furnished terrace in our Double Urban Loft and
                                                    Unique Junior Loft Suite.</p>
                                                <a href="#" class="btn_01 ">View Project</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="video-area section-img-bg2 d-flex align-items-center"
                data-background="{{ asset('img/gallery/video-bg.jpg.webp') }}">
                <div class="container">
                    <div class="video-wrap position-relative">

                        <div class="video-icon">
                            <a class="popup-video btn-icon" href="https://www.youtube.com/watch?v=up68UAfH0d0">
                                <img src="{{ asset('img/icon/video-icon_2.svg') }}" alt="">
                            </a>
                        </div>
                    </div>
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
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-location mb-30">
                                <img src="{{ asset('img/gallery/guest1.webp') }}" alt="">
                                <div class="guest-contents guest-contents2">
                                    <h3><a href="#">Free Drinks</a></h3>
                                </div>
                                <div class="guest-contents">
                                    <h3><a href="#">Free Breakfast</a></h3>
                                    <p>The concept and service of the best luxury hotels in Asturias in our sophisticated
                                        Urban
                                        Double and Unique Junior Suite rooms, with the possibility of enjoying a furnished
                                        terrace in our Double Urban Loft and Unique Junior Loft Suite.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-location mb-30">
                                <img src="{{ asset('img/gallery/guest2.jpg') }}" alt="">
                                <div class="guest-contents guest-contents2">
                                    <h3><a href="#">Free Breakfast</a></h3>
                                </div>
                                <div class="guest-contents">
                                    <h3><a href="#">Free Breakfast</a></h3>
                                    <p>The concept and service of the best luxury hotels in Asturias in our sophisticated
                                        Urban
                                        Double and Unique Junior Suite rooms, with the possibility of enjoying a furnished
                                        terrace in our Double Urban Loft and Unique Junior Loft Suite.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-location mb-30">
                                <img src="{{ asset('img/gallery/guest3.webp') }}" alt="">
                                <div class="guest-contents guest-contents2">
                                    <h3><a href="#">Free Dinner</a></h3>
                                </div>
                                <div class="guest-contents">
                                    <h3><a href="#">Free Breakfast</a></h3>
                                    <p>The concept and service of the best luxury hotels in Asturias in our sophisticated
                                        Urban
                                        Double and Unique Junior Suite rooms, with the possibility of enjoying a furnished
                                        terrace in our Double Urban Loft and Unique Junior Loft Suite.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <section class="client-say">
                <div class="container">
                    <div class="custom-row">
                        <div class="client-active">
                            <div class="col-lg-5 col-md-6 col-sm-6">
                                <div class="client-caption">
                                    <h3>Nice Accommodation</h3>
                                    <p>"Leather detail shoulder contrastic colour
                                        contour stunning silhouette working peplum.
                                        Statement buttons cover-up tweaks patch.</p>

                                    <div class="testimonial-founder d-flex align-items-center mt-30">
                                        <div class="founder-text">
                                            <span>- Omeka Lotus</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-6">
                                <div class="client-caption">
                                    <h3>Delicious Food</h3>
                                    <p>"Leather detail shoulder contrastic colour
                                        contour stunning silhouette working peplum.
                                        Statement buttons cover-up tweaks patch.</p>

                                    <div class="testimonial-founder d-flex align-items-center mt-30">
                                        <div class="founder-text">
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
                                        <div class="founder-text">
                                            <span>- Omeka Lotus</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

    </main>

    <style>
        .next {
            display: none;
        }
    </style>

    @if (count($hotels) > 2)
        <script>
            $(document).ready(function() {

                // alert("test");
                pageSize = 6;
                incremSlide = 5;
                startPage = 0;
                numberPage = 0;

                var pageCount = $(".line-content").length / pageSize;
                var totalSlidepPage = Math.floor(pageCount / incremSlide);

                for (var i = 0; i < pageCount; i++) {
                    $("#pagin").append('<li><a href="#topScroll">' + (i + 1) + '</a></li> ');
                    if (i > pageSize) {
                        $("#pagin li").eq(i).hide();
                    }
                }

                var prev = $("<li/>").addClass("prev").html("Prev").click(function() {
                    startPage -= 5;
                    incremSlide -= 5;
                    numberPage--;
                    slide();
                });

                prev.hide();

                var next = $("<li/>").addClass("next").html("Next").click(function() {
                    startPage += 5;
                    incremSlide += 5;
                    numberPage++;
                    slide();
                });

                $("#pagin").prepend(prev).append(next);

                $("#pagin li").first().find("a").addClass("current");

                slide = function(sens) {
                    $("#pagin li").hide();

                    for (t = startPage; t < incremSlide; t++) {
                        $("#pagin li").eq(t + 1).show();
                    }
                    if (startPage == 0) {
                        next.show();
                        prev.hide();
                    } else if (numberPage == totalSlidepPage) {
                        next.hide();
                        prev.show();
                    } else {
                        next.show();
                        prev.show();
                    }


                }

                showPage = function(page) {
                    $(".line-content").hide();
                    $(".line-content").each(function(n) {
                        if (n >= pageSize * (page - 1) && n < pageSize * page)
                            $(this).show();
                    });
                }

                showPage(1);
                $("#pagin li a").eq(0).addClass("current");

                $("#pagin li a").click(function() {
                    $("#pagin li a").removeClass("current");
                    $(this).addClass("current");
                    showPage(parseInt($(this).text()));
                });


            });
        </script>
    @endif

    <script>
        function initMap() {


            var locationArr = @json($locations);

            // console.log(locationArr.length);

            var mainCoords = locationArr[0];
            // console.log(mainCoords);

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

                // console.log(myCoords);

                r = new google.maps.Marker({
                    position: myCoords,
                    map: map,
                    icon: icon,
                    title: myCoords.hotel_name,
                    optimized: true,
                    // label: `${i + 1}`,
                    animation: google.maps.Animation.DROP,
                    url: @json(url('/hotel-details')) + '/' + myCoords.listing_id,
                });




                allMarkers.push(r);




            }

            allMarkers.map((marker) => {
                marker.addListener("click", () => {
                    // marker.addListener("click", toggleBounce);
                    window.open(marker.url, '_blank')
                })
            });
        }



        //         function toggleBounce() {
        //   if (r.getAnimation() !== null) {
        //     r.setAnimation(null);
        //   } else {
        //     r.setAnimation(google.maps.Animation.BOUNCE);
        //   }
        // }
    </script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1GLowllQeWOX52ML3wtC-qYcoZ6ygOwg&libraries=places&callback=initMap">
    </script>

    {{-- <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSuy4U3KFAhhK1gtshBsDJIiKDnK16upg&libraries=places&callback=initMap">
    </script> --}}
@endsection

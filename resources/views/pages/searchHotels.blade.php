@extends('layouts.app')
@section('content')
    {{-- <div class="header-top navBarDetailPage">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="d-flex justify-content-between flex-wrap align-items-center">
                        <div class="header-info-left">
                        </div>
                        <div class="header-info-right d-none d-sm-block">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    <main>
        {{-- {{dd($hotels)}} --}}


        <div class="slider-area hero-bg1   hero-overly"
            style="background-image: url({{ $banner ? asset('storage/' . $banner->banner) : asset('img/h1_hero.jpg') }});">
            {{-- <img   src="../img/h1_hero.jpg" alt=""> --}}
            <div class="single-slider  slider-height1 d-flex align-items-center">
                <div class="container">
                    <div class="row justify-content-center ">
                        <div class="col-xl-7 col-lg-11">

                            <div class="hero-caption pt-10">
                                {{-- <h1>Rest Journey in Single step, in the breathtaking</h1> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.headerSearch')

        </div>

        <div class="container-fluid location-house section-padding">
            <div class="row mx-auto">
                {{-- <div class="col-xl-1 col-lg-1 d-none d-md-block"></div> --}}
                <div class="col-xl-12 col-lg-11 col-md-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-lg-9 col-md-12">

                                <div class="section-tittle mb-50">
                                    <h2>Your Search</h2>
                                    {{-- {{dd($data)}} --}}
                                    <p>From: {{ $data['startDate'] }} - {{ $data['endDate'] }} For {{ $data['adult'] }}
                                        Adult and {{ $data['child'] }} Child.
                                    </p>
                                </div>
                            </div>
                        </div>
                        @include('pages.hotelCard')
                    </div>

                    {{-- <div class="slideproducts"> --}}
                    {{-- </div> --}}

                </div>
                {{-- </div> --}}
                {{-- <div class="col-xl-4 col-lg-4 col-md-12">
                    <div id="map" style="height: 68rem; width:100%;">
                    </div>
                </div> --}}
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
                            <div class="single-location single-location2 mb-30 mb-30">
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
                            <div class="single-location single-location2 mb-30 mb-30">
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
                            <div class="single-location single-location2 mb-30 mb-30">
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
                pageSize = 4;
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

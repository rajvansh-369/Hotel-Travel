@extends('layouts.app')
@section('content')



<main>
    {{-- {{dd($hotels->picture)}} --}}
    <div class="slider-area hero-bg1  hero-overly">
        <div class="single-slider  slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center ">
                    <div class="col-xl-7 col-lg-11">

                        <div class="hero-caption hero-caption2 pt-10">
                            <h1>Our Rooms</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <form action="#" class="search-box pb-45">
                <div class="row align-items-end">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

                        <div class="date-pic mb-15">
                            <label for="#">Check In Date*</label>
                            <div class="boking-datepicker">
                                <input id="datepicker1" placeholder="Check in" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

                        <div class="date-pic mb-15">
                            <label for="#">Check Out Date*</label>
                            <div class="boking-datepicker">
                                <input id="datepicker2" placeholder="Check out" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
                        <div class="select-form mb-15">
                            <select name="select" id="select1">
                                <option value="">Adult</option>
                                <option value="">Adult</option>
                                <option value="">Adult</option>
                                <option value="">Adult</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
                        <div class="select-form mb-15">
                            <select name="select" id="select1">
                                <option value="">Children</option>
                                <option value="">Children</option>
                                <option value="">Children</option>
                                <option value="">Children</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
                        <div class="search-form">
                            <a href="#">Search</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="container-fluid location-house section-padding">
        <div class="row mx-auto">
            <div class="col-xl-2 col-lg-1 d-none d-md-block"></div>
            <div class="col-xl-6 col-lg-7 col-md-12">
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
                @livewire('hotel-search')
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div id="map" style="height: 68rem; width:100%;">
                </div>
            </div>
        </div>
    </div>
 


    <div class="video-area section-img-bg2 d-flex align-items-center" data-background="assets/img/gallery/video-bg.jpg">
        <div class="container">
            <div class="video-wrap position-relative">

                <div class="video-icon">
                    <a class="popup-video btn-icon" href="https://www.youtube.com/watch?v=up68UAfH0d0">
                        <img src="assets/img/icon/video-icon.svg" alt="">
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
                        <img src="assets/img/gallery/guest1.jpg" alt="">
                        <div class="guest-contents guest-contents2">
                            <h3><a href="#">Free Drinks</a></h3>
                        </div>
                        <div class="guest-contents">
                            <h3><a href="#">Free Breakfast</a></h3>
                            <p>The concept and service of the best luxury hotels in Asturias in our sophisticated Urban
                                Double and Unique Junior Suite rooms, with the possibility of enjoying a furnished
                                terrace in our Double Urban Loft and Unique Junior Loft Suite.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-location single-location2 mb-30 mb-30">
                        <img src="assets/img/gallery/guest2.jpg" alt="">
                        <div class="guest-contents guest-contents2">
                            <h3><a href="#">Free Breakfast</a></h3>
                        </div>
                        <div class="guest-contents">
                            <h3><a href="#">Free Breakfast</a></h3>
                            <p>The concept and service of the best luxury hotels in Asturias in our sophisticated Urban
                                Double and Unique Junior Suite rooms, with the possibility of enjoying a furnished
                                terrace in our Double Urban Loft and Unique Junior Loft Suite.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-location single-location2 mb-30 mb-30">
                        <img src="assets/img/gallery/guest3.jpg" alt="">
                        <div class="guest-contents guest-contents2">
                            <h3><a href="#">Free Dinner</a></h3>
                        </div>
                        <div class="guest-contents">
                            <h3><a href="#">Free Breakfast</a></h3>
                            <p>The concept and service of the best luxury hotels in Asturias in our sophisticated Urban
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

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSuy4U3KFAhhK1gtshBsDJIiKDnK16upg&libraries=places&callback=initMap">
    </script>



@endsection

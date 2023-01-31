@extends('layouts.app')
@section('content')
{{-- {{ dd(session('fromDate')) }} --}}
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
        <div class="container-fluid  gallery">
            <div class="lightbox">
                <div class="row">
                    <div class="col-lg-6">
                        @foreach ($hotel->picture->where('picture_type', 'main_picture')->take(1) as $picture)
                            <img src="{{ asset('/storage/' . $picture->picture) }}"
                                data-mdb-img="{{ asset('/storage/' . $picture->picture) }}" alt="{{ $hotel->name }}"
                                class="w-100 mw-100 shadow-1-strong rounded" />
                        @endforeach
                    </div>
                    <div class="col-lg-6">
                        <div class="row ">

                            @foreach ($hotel->picture->where('picture_type', 'rest_image')->take(4) as $picture)
                                <div class="col-lg-6 gallery_img ">
                                    <img src="{{ asset('/storage/' . $picture->picture) }}"
                                        data-mdb-img="https://mdbcdn.b-cdn.net/img/Photos/Slides/1.webp"
                                        alt="Table Full of Spices"
                                        class="w-100 mb-2 mb-md-4 shadow-1-strong rounded gallery_images " />
                                </div>
                            @endforeach


                        </div>

                    </div>
                </div>
            </div>
            {{-- <hr class="hr" /> --}}
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

                            <h4>{{ $hotel->name }}</h4>

                            <p class="locnm mt-3">

                                {{ $hotel->address->formatted_address }}<br>

                            </p>

                            <p>
                                <b>Minimum booking duration:</b> {{ $hotel->min_hour }} Hour<br>
                                <b>Advance notice:</b> {{ $hotel->advance_notice }}


                            </p>


                        </section>

                        <section class="amenities-boxes detail-amen-box d-block position-relative ">
                            <h4>Amenities</h4>

                            <div class="row mb-2 ps-2">
                                <ul class="features-list">
                                    <li class="feature-all feature-1" style=""> <b>&#x2022 </b> Bicycle parking
                                    </li>
                                    <li class="feature-all feature-2" style=""> <b>&#x2022 </b>Catering options
                                    </li>
                                    <li class="feature-all feature-3" style=""> <b>&#x2022 </b>Kitchenette
                                        Whiteboard walls with markers
                                    </li>
                                    <li class="feature-all feature-4" style=""> <b>&#x2022 </b>Free parking for host
                                        and
                                        guests
                                    </li>
                                    <li class="feature-all feature-5" style="display:none"> <b>&#x2022 </b>Logitech camera
                                        &amp;
                                        videoconferencing
                                        equipment
                                    </li>
                                </ul>
                                <a onclick="showMore('feature')" id="feature-show-btn" class="undline-text">Show all
                                    Features</a>
                                <a onclick="showLess('feature')" id="feature-hide-btn" style="display: none;"
                                    class="undline-text">Show less</a>
                            </div>

                        </section>

                        <section class="features pb-4">
                            <h4>Features</h4>
                            <ul class="features-list">
                                <li class="feature-all feature-1" style=""> <b>&#x2022 </b> Bicycle parking
                                </li>
                                <li class="feature-all feature-2" style=""> <b>&#x2022 </b>Catering options
                                </li>
                                <li class="feature-all feature-3" style=""> <b>&#x2022 </b>Kitchenette
                                    Whiteboard walls with markers
                                </li>
                                <li class="feature-all feature-4" style=""> <b>&#x2022 </b>Free parking for host and
                                    guests
                                </li>
                                <li class="feature-all feature-5" style="display:none"> <b>&#x2022 </b>Logitech camera &amp;
                                    videoconferencing
                                    equipment
                                </li>
                            </ul>
                            <a onclick="showMore('feature')" id="feature-show-btn" class="undline-text">Show all
                                Features</a>
                            <a onclick="showLess('feature')" id="feature-hide-btn" style="display: none;"
                                class="undline-text">Show less</a>
                        </section>

                        <section class="house-rules">


                            {{-- <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                            data-bs-target="#loginPop  ">CONTACT HOST</button> --}}


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

                                            <button type="button" class="btn btn-primary mt-3"
                                                onclick="sendmsg('119','286')"
                                                style="padding: 5px 20px; background-color: #ff671d; border-color: #ff671d;">SEND</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-5 col-lg-4">

                            @livewire('availbility', ['hotel' =>$hotel])
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="card-body">
                                        <h2 class="loginPop-title">Welcome to Hotel's in BodhGaya</h2>

                                        <div class="pt-3 pb-3 ">


                                            @livewire('login')
                                            <div class="login-footer">
                                                <div class="row mx-auto">
                                                    <div class="col-md-7 my-3">
                                                        <p class="mt-2">Don't have an account?</p>
                                                    </div>
                                                    <div class="col-md-5    my-3">
                                                        <a class="btn btn-others" href="{{ route('registerView') }}">SIGN
                                                            UP</a>
                                                    </div>
                                                    <div class="col-md-12 text-center">
                                                        <button class="btn btn-others" href="">Forgot
                                                            Password?</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    @livewire('bedroom-type', ['hotel' => $hotel])
                    <section class="otherbrthishost py-5" style="display:block">
                        <div class="row">
                            <div class="col-md-12">
                            </div>
                        </div>

                    </section>
                </div>

            </div>
    </main>

    <script>
        function showMore(showClass) {
            $('.' + showClass + '-all').show();
            $('#' + showClass + '-show-btn').hide();
            $('#' + showClass + '-hide-btn').show();
        }

        function showLess(showClass) {
            $('.' + showClass + '-all').hide();
            $('#' + showClass + '-show-btn').show();
            $('#' + showClass + '-hide-btn').hide();

            for (let i = 1; i <= 4; i++) {
                $('.' + showClass + '-' + i).show();
            }
        }



        function initMap() {
            var locationArr = {
                lat: parseFloat(@json($location['lat'])),
                lng: parseFloat(@json($location['lng']))
            };
            console.log(locationArr);
            var mapOptions = {
                center: locationArr,
                zoom: 14
            };

            const map = new google.maps.Map(document.getElementById('map-listing'), mapOptions);
            const icon = {
                url: @json(asset('/storage/map_pointer.png')), // url
                scaledSize: new google.maps.Size(35, 50), // scaled size

            };

            var allMarkers = [];
            r = new google.maps.Marker({
                position: locationArr,
                map: map,
                icon: icon,
                url: 'https://maps.google.com/?q=' + (@json($location['lat'])) + ',' + (
                    @json($location['lng'])),
            });

            allMarkers.push(r);

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

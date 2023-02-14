@extends('layouts.app')
@section('content')
    {{-- {{ dd(session('fromDate')) }} --}}
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
    {{-- {{dd($hotel->picture[3])}} --}}


    <main>
        <div class="container-fluid  gallery">
            <div class="lightbox">
                <div class="row desktopSlider" >
                    <div class="col-lg-6 col-sm-6">
                        @foreach ($hotel->picture->where('picture_type', 'main_picture')->take(1) as $picture)
                            <img src="{{ asset('/storage/' . $picture->picture) }}"
                                data-mdb-img="{{ asset('/storage/' . $picture->picture) }}" alt="{{ $hotel->name }}"
                                class="w-100 mw-100 shadow-1-strong rounded full_screen" />
                        @endforeach
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="row ">

                            @foreach ($hotel->picture->where('picture_type', 'rest_image')->take(2) as $picture)
                                <div class="col-lg-6 col-sm-6 gallery_img ">
                                    <img src="{{ asset('/storage/' . $picture->picture) }}"
                                        data-mdb-img="https://mdbcdn.b-cdn.net/img/Photos/Slides/1.webp"
                                        alt="Table Full of Spices"
                                        class="w-100 mb-2 mb-md-4 shadow-1-strong rounded gallery_images margin_gallery" />
                                </div>
                            @endforeach

                            @if (count($hotel->picture) > 3)
                                <div class="col-lg-6 col-sm-6 gallery_img ">
                                    <img src="{{ asset('/storage/' . $hotel->picture[3]->picture) }}"
                                        data-mdb-img="https://mdbcdn.b-cdn.net/img/Photos/Slides/1.webp"
                                        alt="Table Full of Spices"
                                        class="w-100 mb-2 mb-md-4 shadow-1-strong rounded gallery_images  hide_gallery " />

                                    {{-- <img data-bs-toggle="modal" data-bs-target="#exampleModal" src="{{asset('img/more_gallery.png')}}" class="plusSign" alt=""> --}}
                                </div>
                                @if (count($hotel->picture) > 4)
                                    <div class="col-lg-6 col-sm-6 gallery_img ">
                                        <img src="{{ asset('/storage/' . $hotel->picture[4]->picture) }}"
                                            data-mdb-img="https://mdbcdn.b-cdn.net/img/Photos/Slides/1.webp"
                                            alt="Table Full of Spices"
                                            class="w-100 mb-2 mb-md-4 shadow-1-strong rounded gallery_images  hide_gallery " />

                                        {{-- <img data-bs-toggle="modal" data-bs-target="#exampleModal" src="{{asset('img/more_gallery.png')}}" class="plusSign hide_gallery" alt=""> --}}
                                    </div>
                                @endif
                            @endif

                        </div>

                    </div>
                </div>


                <div class="row mobieSlider">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

                        <div class="carousel-inner">
                            @foreach ($hotel->picture as $key => $picture)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="{{ asset('/storage/' . $picture->picture) }}" class="d-block w-100 min_maxHeight" alt="...">
                            <div class="carousel-caption ">
                              <h5 class="countSlider">{{$key+1}}/{{count($hotel->picture)}}</h5>
                              {{-- <p>Some representative placeholder content for the first slide.</p> --}}
                            </div>
                          </div>
                          @endforeach

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModalGallery" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Gallery</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">

                                <div class="carousel-inner">

                                    @foreach ($hotel->picture as $key => $picture)
                                        <div class="carousel-item  {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ asset('/storage/' . $picture->picture) }}"
                                                class="d-block w-100 min_maxHeight" alt="...">
                                            <div class="carousel-caption  d-md-block">
                                                <h2 class="bedroom_name">{{ $hotel->name }}</h2>

                                            </div>
                                        </div>
                                    @endforeach


                                </div>


                                <div class="row d-flex justify-content-center mt-2">
                                    @foreach ($hotel->picture as $key => $picture)
                                        <div class="col-sm-2 flex-column alignFlex ">
                                            <img src="{{ asset('/storage/' . $picture->picture) }}"
                                                class="d-block w-100 min_maxHeight_galleryList mx-1 mt-1" alt="...">

                                        </div>
                                    @endforeach

                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>


                            @forelse ($hotel->bedrooms as  $bedroom)
                                <div id="carouselExampleControls_Bedroom{{ $loop->index }}" class="carousel slide mt-5"
                                    data-bs-ride="carousel">

                                    <div class="carousel-inner">

                                        @foreach ($bedroom->bedroomPicture as $key => $picture)
                                            <div class="carousel-item  {{ $key == 0 ? 'active' : '' }}">
                                                <img src="{{ asset('/storage/' . $picture->picture) }}"
                                                    class="d-block w-100 min_maxHeight" alt="...">

                                                <div class="carousel-caption  d-md-block">
                                                    <h2 class="bedroom_name">{{ $bedroom->bedroom_name }} Bedroom</h2>

                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                    <div class="row d-flex justify-content-center mt-2">
                                        @foreach ($bedroom->bedroomPicture as $key => $picture)
                                            <div class="col-sm-2 flex-column alignFlex">
                                                <img src="{{ asset('/storage/' . $picture->picture) }}"
                                                    class="d-block w-100 min_maxHeight_galleryList mx-1 mt-1 "
                                                    alt="...">

                                            </div>
                                        @endforeach

                                    </div>
                                    @if (count($bedroom->bedroomPicture) > 1)
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleControls_Bedroom{{ $loop->index }}"
                                            data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleControls_Bedroom{{ $loop->index }}"
                                            data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    @endif
                                </div>

                            @empty
                            @endforelse






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
                                    {{-- <li class="feature-all feature-3" style=""> <b>&#x2022 </b>Kitchenette
                                        Whiteboard walls with markers
                                    </li> --}}

                                    {{-- {{dd($hotel->amenities)}} --}}

                                    @forelse ($hotel->amenities as $amenity)
                                        <li class="feature-all feature-4" style="display:none"> <b>&#x2022 </b>
                                            {{ $amenity->name }}
                                        </li>
                                    @empty
                                    @endforelse


                                </ul>
                                <a onclick="showMore('feature')" id="feature-show-btn" class="undline-text">Show all
                                    Features</a>
                                <a onclick="showLess('feature')" id="feature-hide-btn" style="display: none;"
                                    class="undline-text">Show less</a>
                            </div>

                        </section>

                        @if ($hotel->videos)
                            <h4>Video</h4>
                            <div class="container my-3">
                                <div class="row">

                                    <div class="video">
                                        <video controls class="videoSource">
                                            <source src="{{ asset('storage/' . $hotel->videos->video) }}"
                                                type="video/mp4">

                                        </video>
                                    </div>

                                </div>
                            </div>
                        @endif
                        <h4>Gallery</h4>

                        <div class="container">
                            <div class="row forDesktopGallery">
                                @foreach ($hotel->picture as $picture)
                                    <div class="col-lg-2 gallery_img ">
                                        <img src="{{ asset('/storage/' . $picture->picture) }}"
                                            data-mdb-img="https://mdbcdn.b-cdn.net/img/Photos/Slides/1.webp"
                                            alt="Table Full of Spices"
                                            class="w-100 mb-2 mb-md-4 shadow-1-strong rounded gallery_img_height" />

                                    </div>
                                @endforeach

                                <button data-bs-toggle="modal" data-bs-target="#exampleModalGallery"
                                    class="btn2 btn-primary mb-3">Click here to Enlarge Picture</button>




                            </div>


                            <div class="row forMobileGallery">
                                @foreach ($hotel->picture->take(2) as $picture)
                                    <div class="col-lg-2 gallery_img ">
                                        <img src="{{ asset('/storage/' . $picture->picture) }}"
                                            data-mdb-img="https://mdbcdn.b-cdn.net/img/Photos/Slides/1.webp"
                                            alt="Table Full of Spices"
                                            class="w-100 mb-2 mb-md-4 shadow-1-strong rounded gallery_img_height" />
                                    </div>
                                @endforeach

                                <button data-bs-toggle="modal" data-bs-target="#exampleModalGallery"
                                    class="btn btn-primary mb-3">Click here to Show more Picture</button>
                            </div>




                        </div>



                        {{-- <section class="features pb-4">
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
                        </section> --}}

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
{{-- style="max-width: 20rem;" --}}
                        <div class="card text-dark bg-light mb-3 availability" >
                            <div class="card-header">Availability</div>
                            <div class="card-body ">


                                <form action="{{ route('preBooking') }}" method="post">
                                    @csrf

                                    {{-- <div class="row justify-content-between hr" id="hr1">
                                        <div class="col-md-8 col-sm-8">
                                            <p class="pricehrdy"><strong>Full Day Start Time :</strong></p>

                                        </div>

                                        <div class="col-md-4 col-sm-4">
                                            <p>{{ $hotel->full_day_start_time }}</p>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between hr" id="hr1">
                                        <div class="col-md-8 col-sm-8">
                                            <p class="pricehrdy"><strong>Full Day End Time :</strong></p>

                                        </div>

                                        <div class="col-md-4 col-sm-4">
                                            <p>{{ $hotel->full_day_end_time }}</p>
                                        </div>
                                    </div> --}}

                                    {{-- {{dd(session('priceWithoutTax'))}} --}}

                                    {{-- <section class="availability-card"> --}}
                                    <div class="row justify-content-between hr" id="hr1">
                                        <div class="col-md-8 col-sm-8">
                                            <p class="pricehrdy">
                                                <strong>₹ <span
                                                        class="bedroomPrice">{{ session('priceWithoutTax') ? session('priceWithoutTax') : $hotel->price_per_day }}</span></strong><span>/day</span>
                                            </p>

                                        </div>
                                        @if ($hotel->full_discount_rate != 0)
                                            <div class="col-md-4 col-sm-4">
                                                <p class="dicnt">
                                                    <strong>{{ $hotel->full_discount_rate }}</strong>%<br>Discount
                                                </p>
                                            </div>
                                        @endif
                                    </div>

                                    {{-- {{dd(session()->all()   )}} --}}
                                    <div class="row justify-content-between hr" id="hr1">
                                        <label for="#">Select Bedroom Type*</label>
                                        <select id="select" onchange="checkDate()" name="bedroomPrice">
                                            <option value="">Select Bedroom Type</option>
                                            <option value="{{ $hotel->price_per_day }}" selected>Normal </option>

                                            @forelse ($hotel->bedrooms as $bedroom)
                                                <option value="{{ $bedroom->bedroom_price }}"
                                                    {{ session('bedroomPrice') == $bedroom->bedroom_price ? 'selected' : '' }}>
                                                    {{ $bedroom->bedroom_name }}</option>

                                            @empty
                                            @endforelse


                                        </select>

                                    </div>


                                    {{-- <h5 class="card-title">Price per Day : <b>₹{{ $hotel->price_per_day }}</b></h5> --}}

                                    <div class="date-pic mb-15">
                                        <label for="#">Check In Date*</label>
                                        <div class="boking-datepicker ">
                                            <input id="datepicker1" required name="startDate"
                                                value="{{ session('startDate') ??  \Carbon\Carbon::now()->format('m/d/Y')  }} " onchange="checkDate()"
                                                placeholder="Check in" class="text-secondary datePicker" />
                                            @if (auth()->user())
                                                <input type="hidden" name="userID" value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="hotelId" value="{{ $hotel->id }}">
                                            @endif
                                        </div>

                                    </div>
                                    <div class="date-pic mb-15">
                                        <label for="#">Check Out Date*</label>
                                        <div class="boking-datepicker">
                                            <input id="datepicker2" required name="endDate"
                                                value="{{ session('endDate') ?? \Carbon\Carbon::now()->addDay()->format('m/d/Y') }} " onchange="checkDate()"
                                                placeholder="Check out" class="text-secondary datePicker" />
                                        </div>
                                    </div>

                                    <p style="color:red" id="errorDate"></p>

                                    @if (auth()->user())
                                        <button type="submit" {{ session('endDate') == null ? 'disabled' : '' }}
                                            id="checkAvailButton"
                                            class="btn2 btn-primary  d-flex justify-content-center">CHECK
                                            AVAILABILITY</button>
                                    @else
                                        <a class="btn2 btn-primary  d-flex justify-content-center" id="checkAvailButton" data-bs-toggle="modal"
                                            data-bs-target="#loginModal">CHECK
                                            AVAILABILITY</a>
                                    @endif

                                </form>
                            </div>
                        </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                                        <a class="btn2 btn-others" href="{{ route('registerView') }}">SIGN
                                                            UP</a>
                                                    </div>
                                                    <div class="col-md-12 text-center">
                                                        <button class="btn2 btn-others" href="">Forgot
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
                        <h4>Other Hotels</h4>
                        <div class="row">
                            <div class="col-md-12">
                                @livewire('hotel-search')
                            </div>
                        </div>

                    </section>
                </div>

            </div>
    </main>

    {{-- {{dd(session('endDate') == null ? 'disabled' : '')}} --}}
    <script>
        function checkDate() {
            var startDate = $('#datepicker1').val();
            var endDate = $('#datepicker2').val();

            console.log(startDate, endDate);

            $('#errorDate').html("");
            if (startDate == " " && endDate == " ") {

                // alert("Please Select Check In Dates");
                $('#errorDate').append("Please Select Check In Dates");
            } else if (startDate == endDate) {


                // alert("Check In Date & Check Out Date Should not be same");
                $('#errorDate').append("Check In Date & Check Out Date Should not be same");

            } else if (endDate < startDate) {

                if (endDate == ' ') {
                    $('#errorDate').append("Please Select Check Out Dates");

                } else {

                    $('#errorDate').append("Check In Date should be greater than Check Out Date");
                }


            } else {

                document.getElementById('checkAvailButton').disabled = false;
                bedroomPriceFunc();
            }
        }

        function bedroomPriceFunc() {
            var bedroomTypePrice = $('.list .selected').data('value');
            if (bedroomTypePrice == '') {

                var bedroomTypePrice = @json($hotel->price_per_day)
            }
            var startDate = $('#datepicker1').val();
            var endDate = $('#datepicker2').val();

            console.log(bedroomTypePrice, startDate, endDate);


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: @json(route('bedroomsPrice')),
                type: 'post',
                data: {
                    'price_per_day': @json($hotel->price_per_day),
                    'startDate': startDate,
                    'endDate': endDate,
                    'bedroomTypePrice': bedroomTypePrice,

                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('.bedroomPrice').html("");
                    Livewire.emit('mount')
                    // if (data > 1) {

                    //     var finalPrice =  bedroomTypePrice * data
                    //     console.log(finalPrice);
                    $('.bedroomPrice').append(data);



                    // }
                    // window.location.href = @json(route('searchResult'));
                },
                error: function(request, error) {
                    console.log(request);
                    console.log(error);
                    // alert("Request: " + JSON.stringify(request));
                }
            });
        }


        // function showMore(showClass) {
        //     $('.' + showClass + '-all').show();
        //     $('#' + showClass + '-show-btn').hide();
        //     $('#' + showClass + '-hide-btn').show();
        // }

        // function showLess(showClass) {
        //     $('.' + showClass + '-all').hide();
        //     $('#' + showClass + '-show-btn').show();
        //     $('#' + showClass + '-hide-btn').hide();

        //     for (let i = 1; i <= 3; i++) {
        //         $('.' + showClass + '-' + i).show();
        //     }
        // }



        // function initMap() {
        //     var locationArr = {
        //         lat: parseFloat(@json($location['lat'])),
        //         lng: parseFloat(@json($location['lng']))
        //     };
        //     console.log(locationArr);
        //     var mapOptions = {
        //         center: locationArr,
        //         zoom: 14
        //     };

        //     const map = new google.maps.Map(document.getElementById('map-listing'), mapOptions);
        //     const icon = {
        //         url: @json(asset('/storage/map_pointer.png')), // url
        //         scaledSize: new google.maps.Size(35, 50), // scaled size

        //     };

        //     var allMarkers = [];
        //     r = new google.maps.Marker({
        //         position: locationArr,
        //         map: map,
        //         icon: icon,
        //         url: 'https://maps.google.com/?q=' + (@json($location['lat'])) + ',' + (
        //             @json($location['lng'])),
        //     });

        //     allMarkers.push(r);

        //     allMarkers.map((marker) => {
        //         marker.addListener("click", () => {
        //             window.open(marker.url, '_blank')
        //         })
        //     });

        // }
    </script>
    {{-- <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSuy4U3KFAhhK1gtshBsDJIiKDnK16upg&libraries=places&callback=initMap">
    </script> --}}
@endsection

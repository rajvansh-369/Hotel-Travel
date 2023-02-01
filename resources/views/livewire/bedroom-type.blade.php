<div>
    @if (count($hotel->bedrooms)> 0)
        
    
    <section class="location mt-5">
        <h4>Bedrooms Type</h4>
        <!-- <iframe width="450" height="250" frameborder="0" style="border:0;"
                            referrerpolicy="no-referrer-when-downgrade"
                            src="https://www.google.com/maps/embed/v1/place?q=44.7009146,-63.6864&key=AIzaSyCSuy4U3KFAhhK1gtshBsDJIiKDnK16upg"
                            allowfullscreen>]
                        </iframe> -->

        {{-- {{dd($hotel->bedrooms)}} --}}

        <div class="col-md-12 px-0 ">
            <div class="row">

                @forelse ($hotel->bedrooms as  $bedroom)

                    {{-- {{dd($bedroom->bedroomPicture)}} --}}
                    <div class="col-md-4 cardslider">
                        <div class="card card_home ">
                            <div id="carouselExampleIndicators{{ $loop->index }}" class="carousel slide"
                                data-bs-interval="0" data-bs-ride="carousel">
                                <a style="text-decoration: none;"
                                    href="{{ route('hotel-details', $hotel->id) }}">
                                    <div class="carousel-inner bg-image hover-overlay ripple" style="height: 10rem">

                                        @php $key = 0;@endphp
                                        @foreach ($bedroom->bedroomPicture  as $picture)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                <img src="{{ asset('/storage/' . $picture->picture) }}"  class="img-fluid card_Bedroom">

                                            </div>

                                            @php $key++;@endphp
                                        @endforeach

                                    </div>
                                    @if (count($bedroom->bedroomPicture) > 1)
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


                                {{-- <a class="pprpln"><i class="fa fa-paper-plane-o"
                                        aria-hidden="true"></i>&nbsp;10724.7km</a> --}}



                            </div>     

                            {{-- <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img src="{{ asset('storage/' . $bedroom->bedroom_image) }}"
                                    class="img-fluid card_Bedroom" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div> --}}


                            <div class="card-body">
                                <h5 class="card-title bedroom_title">{{ $bedroom->bedroom_name }}</h5>
                                <div
                                    class=" roomInfo maxPersonsInfo rt_occ_above m_hp_rt_room_card__occupancy-container ">
                                    <span class="roomDetailHeading">
                                        Price for up to:
                                    </span>
                                    <div class="person_icon mx-1">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>
                                </div>

                                {{-- {{dd($hotel->amenities)}} --}}
                                    <div class="row">
                                        @forelse ($bedroom->BedroomAmenities as $amenity)
                                            {{-- <div class=""> --}}
                                            <div class="col-md-2 mx-1 my-1 mb-2 amenity">

                                                <img src="{{ asset('storage/' . $amenity->icon) }}" width="20px"
                                                    alt="">
                                                <label for="">{{ $amenity->name }}</label>
                                                {{-- </div> --}}
                                            </div>

                                        @empty
                                        @endforelse
                                    </div>

                                <h5>Price : <span
                                        class="price_beroom">₹{{ $days > 0 ? $days * $bedroom->bedroom_price : $bedroom->bedroom_price }}
                                    </span> </h5>
                            </div>
                        </div>

                    </div>
                @empty
                @endforelse



            </div>





            {{-- <div id="map-listing" style="height: 100%; height:420px;"> </div> --}}
        </div>
    </section>
    @else
        
    @endif
</div>

<div>

    <section class="location mt-5">
        <h4>Bedrooms Type</h4>
        <!-- <iframe width="450" height="250" frameborder="0" style="border:0;"
                            referrerpolicy="no-referrer-when-downgrade"
                            src="https://www.google.com/maps/embed/v1/place?q=44.7009146,-63.6864&key=AIzaSyCSuy4U3KFAhhK1gtshBsDJIiKDnK16upg"
                            allowfullscreen>]
                        </iframe> -->

        {{-- {{dd($hotel->bedrooms)}} --}}

        <div class="col-md-12 px-0">
            <div class="row">

                @forelse ($hotel->bedrooms as  $bedroom)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img src="{{ asset('storage/' . $bedroom->bedroom_image) }}"
                                    class="img-fluid card_Bedroom" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $bedroom->bedroom_name }}</h5>
                                <h5 class="card-title">Price : {{ $days > 0 ? $days * $bedroom->bedroom_price : $bedroom->bedroom_price }}</h5>
                                <p class="card-text">Some quick example text to build on the card title and
                                    make up the bulk of the card's content.</p>
                                <a href="#!" class="btn btn-primary">Button</a>
                            </div>
                        </div>

                    </div>
                @empty
                @endforelse



            </div>





            {{-- <div id="map-listing" style="height: 100%; height:420px;"> </div> --}}
        </div>
    </section>
</div>

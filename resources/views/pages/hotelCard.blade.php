
{{-- <div class="container-fluid cardslider flex-wrap"> --}}
    <div class="slideproducts">
    <div class="row cardslider flex-wrap">

        @foreach ($hotels as $hotel)
        <div class="col-md-3 col-sm-6  py-1 line-content">
            {{-- {{dd($loop->index)}} --}}
            <a href="{{route('hotel-details', $hotel->id)}}">
                <div class="card card_home" >
                    <div id="carouselExampleIndicators{{ $loop->index }}" class="carousel slide"
                        data-bs-interval="0" data-bs-ride="carousel">
                        <a style="text-decoration: none;"
                            href="{{ route('hotel-details', $hotel->id) }}">
                            <div class="carousel-inner" style="height: 15rem;border-radius:10px">

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
                    <a href="{{route('hotel-details', $hotel->id)}}">

                    <div class="card-body" style="font-family: 'Myriad Pro Semibold';">
                        <b>
                            <h1 class="card-title">{{ $hotel->name }} </h1>
                        </b>


                        <h5> {{ $hotel->address->formatted_address }}</h5>
                        {{-- <h5 class="card-title">Conference Room @ Workspace Bedford</h5> --}} 
                        <p>{{$hotel->adult}} Adult {{$hotel->child}} Children</p>
                        <p class="card-text mt-2">Started From <Span class="price_card"> ₹{{ $hotel->price_per_day }} </Span>
                                         {{-- <div class="price">
                                            <span>Started from<span>$500</span></span>
                                        </div> --}}



                        </p>
                        <ul class="fivestars m-0 p-0">
                        </ul>
                    </div>
                </a>
                </div>

            </div>
        @endforeach
        <ul id="pagin">
            
        </ul>
    </div>

</div>   
{{-- </div> --}}

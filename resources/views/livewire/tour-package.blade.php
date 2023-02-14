<div>
    <div class="slideproducts">
            {{-- <input wire:keydown="search" wire:model="searchText" type="search" id="form1" class="form-control"
                placeholder="Search Your Hotels" aria-label="Search" /> --}}
        {{-- <div class="container   flex-wrap"> --}}
        <div class="row cardslider">

            @foreach ($tourPackages as $tourPackage)
                <div class=" col-md-3 col-sm-5 mt-3 mb-3 py-1 line-content">
                    {{-- {{dd($loop->index)}}
                                    style="width: 20rem; " --}}
                    <div class="card card_home">
                        <div id="carouselExampleIndicators{{ $loop->index }}" class="carousel slide"
                            data-bs-interval="0" data-bs-ride="carousel">
                            <a style="text-decoration: none;" href="{{ route('hotel-details', $tourPackage->id) }}">
                                <div class="carousel-inner" style="height: 15rem;border-radius:10px">

                                    @php $key = 0;@endphp
                                    {{-- @foreach ($tourPackage->image as $picture) --}}
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ asset('/storage/' . $tourPackage->image) }}">

                                        </div>

                                        {{-- @php $key++;@endphp --}}
                                    {{-- @endforeach --}}

                                </div>
                                {{-- @if (count($tourPackage->image) > 1)
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleIndicators{{ $loop->index }}"
                                        data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleIndicators{{ $loop->index }}"
                                        data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                @endif --}}
                            </a>
                            @if ($tourPackage->full_day_discount == 1)
                                <a class="discavl">DISCOUNT AVAILABLE</a>
                            @endif
                            {{-- <a class="discavl">DISCOUNT AVAILABLE</a> --}}

                            {{-- <a class="pprpln"><i class="fa fa-paper-plane-o"
                                                    aria-hidden="true"></i>&nbsp;10724.7km</a> --}}



                        </div>
                        <a href="{{ route('hotel-details', $tourPackage->id) }}">

                            <div class="card-body" style="font-family: 'Myriad Pro Semibold';">
                                <b>
                                    <h1 class="card-title">{{ $tourPackage->tour_name }} </h1>
                                </b>

                                    <p>{!! html_entity_decode(Str::limit($tourPackage->description, 100), ENT_QUOTES, 'UTF-8') !!}</p>
                                {{-- <h5> {{ $tourPackage->address->formatted_address }}</h5> --}}
                                <p class="card-text mt-2">Started From <Span class="price_card">
                                        ₹{{ $tourPackage->price }} </Span>




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
        {{-- </div> --}}
    </div>

    {{-- </div> --}}
    {{-- <div class="col-xl-4 col-lg-4 col-md-12">
                <div id="map" style="height: 68rem; width:100%;">
                </div>
            </div> --}}
    {{-- </div> --}}
    <style>
        .next {
            display: none;
        }
    </style>

    @if (count($tourPackages) > 2)
        <script>
            $(document).ready(function() {

                // alert("test");
                pageSize = 8;
                incremSlide = 5;
                startPage = 0;
                numberPage = 0;

                var pageCount = $(".line-content").length / pageSize;
                var totalSlidepPage = Math.floor(pageCount / incremSlide);

                for (var i = 0; i < pageCount; i++) {
                    $("#pagin").append('<li><a>' + (i + 1) + '</a></li> ');
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

</div>

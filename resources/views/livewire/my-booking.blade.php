<div>

    {{-- <div class="container">
    <h4>My Booking</h4>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8"></div>
    </div>
</div> --}}

    <main>
        {{-- {{dd($hotels)}} --}}

        {{-- TIMEX --}}

        <div class="slider-area hero-bg1   hero-overly"
            style="background-image: url({{ $banner ? asset('storage/' . $banner->banner) : asset('img/h1_hero.jpg') }});">
            <div class="single-slider  slider-height3 d-flex align-items-center">
                <div class="container">
                    <div class="row justify-content-center ">
                        <div class="col-xl-7 col-lg-11">

                            <div class="hero-caption hero-caption3">
                                <h1>My Profile</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="listing_dashboard py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <section class="listing-info">
                            <ul class="Profile">
                                <li class="profile-username">{{ $user->name[0] }}</li>
                                <li class="profile-name">Welcome <br> {{ $user->name }}</li>
                            </ul>


                            <div class="progress mt-3">
                                <div class="progress-bar" role="progressbar" style="width: 34%;background: #ff671d;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="prgrsinfo"><b>Your account is 34% done!</b></p>

                            <p class="updtac text-warning">
                                <a class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    style="color:#ff671d;"> &gt;&gt; UPDATE YOUR ACCOUNT </a>
                            </p>
                        </section>
                    </div>
                    <div class="col-md-8">
                        <div class="dashboard-listing">
                            <div class="row justify-content-around align-items-center mb-4">
                                <div class="col-auto">
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="" selected="">Search by Status</option>
                                        <option value="0">Incomplete</option>
                                        <option value="1">Pending</option>
                                        <option value="2">Active</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="search" class="form-control" aria-describedby="search"
                                        placeholder="Search by Name">
                                    <input type="hidden" id="UserId" class="form-control" value="1"
                                        aria-describedby="search">
                                </div>

                            </div>

                            @forelse ($bookings as $booking)
                                {{-- {{dd($booking->hotel->name)}} --}}
                                <div class="card for-pending mt-3 line-content" id="bookingContent">
                                    <div class="card-header">
                                        @if ($booking->status == 1)
                                            <div class="card-header-text card-header-pending">Pending</div>
                                        @elseif($booking->status == 2)
                                            <div class="card-header-text card-header-active">Confirmed</div>
                                        @elseif($booking->status == 0)
                                            <div class="card-header-text card-header-incomplete">Rejected</div>
                                        @else
                                        @endif
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="list-img">
                                                    <div>
                                                        <img src="{{ asset('storage/' . $booking->hotel?->picture[0]->picture) }}"
                                                            alt="" height="150" width="200">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="list-dtl">
                                                    <div class="list-title position-relative">
                                                        <h4 class="card-title titleh4">{{ $booking->hotel->name }}</h4>

                                                    </div>
                                                    <div class="list-adr">
                                                        <p>{{ $booking->hotel->address->formatted_address }}
                                                        </p>
                                                    </div>

                                                    <div class="list-hrs">
                                                        <div class="row mx-auto">
                                                            <div class="col-md-3 px-0">

                                                                <p class="card-text mt-2">Amount :<Span
                                                                        class="price_card">
                                                                        ₹{{ number_format($booking->totalPrice, 2) }}
                                                                    </Span>
                                                                <div class="list-per-hrs">
                                                                    {{-- <p>$22/hour</p> --}}
                                                                </div>

                                                            </div>

                                                            <div class="col-md-6 px-0">
                                                                <div class="list-action">

                                                                    <ul class="settings">
                                                                        <li>
                                                                            <a
                                                                                href="http://127.0.0.1:8001/listing/edit/4">Reciept
                                                                                &gt;&gt;</a>
                                                                        </li>


                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse


                        </div>
                        <ul id="pagin">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" wire:ignore.self tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="updateProfile">
                    <div>
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                    <div class="modal-body">
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <label class="form-label" for="form6Example1">Full Name</label>
                                    <input type="text" id="form6Example1" wire:model="name"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>

                        <!-- Text input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form6Example4">Address</label>
                            <input type="text" id="form6Example4" wire:model="address" class="form-control" />
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form6Example5">Email</label>
                            <input type="email" id="form6Example5" wire:model="email" class="form-control"
                                readonly />
                        </div>

                        <!-- Number input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form6Example6">Phone</label>
                            <input type="number" id="form6Example6" wire:model="phone" class="form-control" />
                        </div>


                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .next {
            display: none;
        }
    </style>

    {{-- {{dd(count($bookings))}} --}}
    @if (count($bookings) > 2)
        <script>
            $(document).ready(function() {

                //   alert("test");
                pageSize = 4;
                incremSlide = 5;
                startPage = 0;
                numberPage = 0;

                var pageCount = $(".line-content").length / pageSize;
                var totalSlidepPage = Math.floor(pageCount / incremSlide);

                console.log(pageCount);

                for (var i = 0; i < pageCount; i++) {
                    $("#pagin").append('<li><a href="#bookingContent">' + (i + 1) + '</a></li> ');
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

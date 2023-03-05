@extends('layouts.app')
@section('content')

<main>
    {{-- {{dd($hotels)}} --}}

    {{-- TIMEX --}}


    <div class="slider-area hero-bg1  hero-overly" {{-- style="background-image: url({{  $banner ?   asset('storage/' . $banner->banner) : asset('img/h1_hero.jpg')  }});" --}}>
        <div class="single-slider  slider-height2 d-flex align-items-center" style="min-height: 0px !important;">
            <div class="container">
                <div class="row justify-content-start ">
                    <div class="col-xl-7 col-lg-11">

                        <div class="hero-caption hero-caption2 pt-10" style="padding-top: 0px !important;">
                            <h1>Tour & Packages</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @include('layouts.headerSearch') --}}

    </div>

    <div class="container-fluid location-house section-padding tourMobile">
        <div class="row mx-auto">
            <p class="gotosrchrslt "><i class="fa fa-angle-left"></i>
                <a href="{{ route('home') }}">
                    Back
                    <!--Top Rated Around You-->
                </a>
            </p>
            {{-- <div class="col-xl-2 col-lg-1 d-none d-md-block"></div> --}}
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="container">
                    @livewire('tour-package')   
                </div>




            </div>

            <section class="client-say">
                <div class="container">
                    <div class="custom-row">
                        <div class="client-active">
                            @if (count($testimonials) > 2)
                                @forelse ($testimonials as  $testimonial)
                                    <div class="col-lg-5 col-md-6 col-sm-6">
                                        <div class="client-caption">
                                            <h3>{{ $testimonial->review_title }}</h3>
                                            <p>{{ $testimonial->review_desc }}</p>

                                            <div class="testimonial-founder d-flex align-items-center mt-30">
                                                <div class="testimonialimg">
                                                    <img src="{{ asset('storage/' . $testimonial->image) }}"
                                                        class="img-fluid" alt="client-img">
                                                </div>
                                                <div class="founder-text mx-1">
                                                    <span> - {{ $testimonial->name }}</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @empty
                                    <div class="col-lg-5 col-md-6 col-sm-6">
                                        <div class="client-caption">
                                            <h3>Delicious Food</h3>
                                            <p>"Leather detail shoulder contrastic colour
                                                contour stunning silhouette working peplum.
                                                Statement buttons cover-up tweaks patch.</p>

                                            <div class="testimonial-founder d-flex align-items-center mt-30">
                                                <div class="testimonialimg">
                                                    <img src="{{ asset('img/testiImg.png') }}" class="img-fluid"
                                                        alt="client-img">
                                                </div>
                                                <div class="founder-text mx-1">
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
                                                <div class="testimonialimg">
                                                    <img src="{{ asset('img/testiImg.png') }}" class="img-fluid"
                                                        alt="client-img">
                                                </div>
                                                <div class="founder-text mx-1">
                                                    <span>- Omeka Lotus</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforelse
                            @else
                                <div class="col-lg-5 col-md-6 col-sm-6">
                                    <div class="client-caption">
                                        <h3>Delicious Food</h3>
                                        <p>"Leather detail shoulder contrastic colour
                                            contour stunning silhouette working peplum.
                                            Statement buttons cover-up tweaks patch.</p>

                                        <div class="testimonial-founder d-flex align-items-center mt-30">
                                            <div class="testimonialimg">
                                                <img src="{{ asset('img/testiImg.png') }}" class="img-fluid"
                                                    alt="client-img">
                                            </div>
                                            <div class="founder-text mx-1">
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
                                            <div class="testimonialimg">
                                                <img src="{{ asset('img/testiImg.png') }}" class="img-fluid"
                                                    alt="client-img">
                                            </div>
                                            <div class="founder-text mx-1">
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
                                            <div class="testimonialimg">
                                                <img src="{{ asset('img/testiImg.png') }}" class="img-fluid"
                                                    alt="client-img">
                                            </div>
                                            <div class="founder-text mx-1">
                                                <span>- Omeka Lotus</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif


                        </div>
                    </div>
                </div>
            </section>
         
</main>



@endsection
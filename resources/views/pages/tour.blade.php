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

    <div class="container-fluid location-house section-padding">
        <div class="row mx-auto">
            {{-- <div class="col-xl-2 col-lg-1 d-none d-md-block"></div> --}}
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="container">
                    @livewire('tour-package')   
                </div>




            </div>


         
</main>



@endsection
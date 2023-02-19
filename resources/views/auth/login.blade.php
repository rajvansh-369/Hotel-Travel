@extends('layouts.app')
@section('content')




<div class="container-fluid">



    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 text-black mt-5">

                    <div class="px-5 ms-xl-4 mt-5">
                        <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #ffffff;"></i>
                        {{-- <span class="h1 fw-bold mb-0">Logo</span> --}}
                    </div>
{{-- px-5 --}}
                    <div class="d-flex align-items-center h-custom-2  ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                        @livewire('login')

                    </div>

                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="{{asset('storage/loginImage.jpg')}}"
                        alt="Login image" class="w-100 vh-100 loginImage" style="object-fit: cover; object-position: left;" >
                </div>

            </div>
        </div>
    </section>


</div>
@endsection

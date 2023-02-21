{{-- <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="{{ asset('img/icon/loder.png') }}" alt="loder">
            </div>
        </div>
    </div>
</div> --}}
{{-- {{dd(\Request::route()->getName())}} --}}
<header>
    <div class="header-area header-transparent">
        <div class="main-header ">
      <div class="header-top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="d-flex justify-content-between flex-wrap align-items-center">
                                <div class="header-info-left">
                                    <ul>
                                        <li><a href="tel:9971840388" style="color:white">Call Us:   +91 9971 (840) 388</a></li>
                                        <li>

                                            <a href="mailto:enquiry@hotel.com" style="color:white">enquiry@hotel.com</a>
                                            {{-- <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                data-cfemail="a2cbccc4cde2d0cdcec3da8cc1cdcf">[email&#160;protected]</a> --}}
                                      </li>
                                    </ul>
                                </div>
                                <div class="header-info-right d-none d-sm-block">
                                    <ul class="header-social">
                                        <li><img src="{{asset('storage/inr_logo.webp')}}" style="max-width:25px;" class="img-fluid"></li>
                                        <li><a href="/admin"><button class="btn2">List your property</button> </a></li>
                                        <li><a href="{{route('registerView')}}"><button class="btn">Register</button> </a></li>
                                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a target="_blank" href="https://wa.me/+919971840388"><i class="fab fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            {{-- header-sticky --}}
            <div class="header-bottom ">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">

                        <div class="logo">

                            <a href="{{route('home')}}">
                                
                                
                                <img class="mainLogo" src="{{asset('img/logo/mainLogo_1.png')}}" width="50px" alt="">
                            
                            </a>
                           
                        </div>
                        <div class="logo">

                            
                            <a href="{{route('home')}}">
                                <h1 class="logoName">Hotels in <span style="color:#fff">Bo</span>dhgaya</h1>
                                {{-- <img class="logoName" src="{{asset('img/logo/logo2.png')}}" width="200px" alt=""> --}}
                            </a>
                           
                        </div>
                        <div class="menu-wrapper d-flex align-items-center">

                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation" class="navBarUL">
                                        <li class="{{ (\Request::route()->getName() == 'home') ? 'active' : ''}}"><a href="{{route('home')}}">Home</a></li>
                                        <li  class="{{(\Request::route()->getName() == 'hotels') ? 'active' : ''}}"><a href="{{route('hotels')}}">Hotels</a></li>
                                        <li  class="{{(\Request::route()->getName() == 'tour') ? 'active' : ''}}"><a href="{{route('tour')}}">Tour Package</a></li>
                                        <li  class="{{(\Request::route()->getName() == 'taxi') ? 'active' : ''}}"><a href="{{route('taxi')}}">Taxi</a></li>
                                        <li  class="{{(\Request::route()->getName() == 'about') ? 'active' : ''}}"><a href="{{route('about')}}">About</a></li>
                                        @if (auth()->user())
                                        <li><a href="#">My Account</a>
                                            <ul class="submenu">
                                                <li><a href="{{route('myBooking')}}">My Booking</a></li>
                                                <li><a href="{{route('logout')}}">Logout</a></li>
                                            </ul>
                                        </li>
                                        @endif
                                        <li  class="{{(\Request::route()->getName()== 'contact' )? 'active' :''}}"><a href="{{route('contact')}}">Contact Us</a></li>
                                      {{-- @if (auth()->user())
                                      <li><a href="{{route('logout')}}">Logout</a></li>
                                          
                                      @endif --}}
                                    </ul>
                                </nav>
                            </div>

                            <div class="header-right-btn f-right d-flex align-items-center">
                                <a href="{{ auth()->user() ? "#" :  route('loginView') }} " class="header-btn2 d-none d-lg-block"> 
                                   
                                    {{ auth()->user() ? "Welcome: " : ""}}   
                                    <span class="loginName" > {{ auth()->user() ? auth()->user()->name : "Login"}} </span></a>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="header-top navBarDetailPage">
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
</div>

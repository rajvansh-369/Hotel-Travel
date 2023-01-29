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
                                        <li>Call Us: +10 (89) 675 5456</li>
                                        <li>

                                            <a href="">enquiry@hotel.com</a>
                                            {{-- <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                data-cfemail="a2cbccc4cde2d0cdcec3da8cc1cdcf">[email&#160;protected]</a> --}}
                                        </li>
                                    </ul>
                                </div>
                                <div class="header-info-right d-none d-sm-block">
                                    <ul class="header-social">
                                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">

                        <div class="logo">
                            <a href="index.html"><img src="{{asset('img/logo/logo.webp')}}" alt=""></a>
                        </div>
                        <div class="menu-wrapper d-flex align-items-center">

                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{route('home')}}">Home</a></li>
                                        <li><a href="{{route('hotels')}}">Hotels</a></li>
                                        <li><a href="about.html">About</a></li>
                                        {{-- <li><a href="#">Blog</a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="blog_details.html">Blog Details</a></li>
                                                <li><a href="elements.html">Element</a></li>
                                            </ul>
                                        </li> --}}
                                        <li><a href="{{route('contact')}}">Contact Us</a></li>
                                      @if (auth()->user())
                                      <li><a href="{{route('logout')}}">Logout</a></li>
                                          
                                      @endif
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
                        {{-- <ul>
                            <li>Call Us: +10 (89) 675 5456</li>
                            <li>

                                <a href="">enquiry@hotel.com</a>
                                
                            </li>
                        </ul> --}}
                    </div>
                    <div class="header-info-right d-none d-sm-block">
                        {{-- <ul class="header-social">
                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

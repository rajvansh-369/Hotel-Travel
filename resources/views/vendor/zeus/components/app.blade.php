<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ __('filament::layout.direction') ?? 'ltr' }}"
    class="antialiased filament js-focus-visible">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="application-name" content="{{ config('app.name', 'Laravel') }}">

    <!-- Seo Tags -->
    <x-seo::meta />
    <!-- Seo Tags -->
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    @include('meta::manager', [
        'title'         => config('app.name', 'Laravel'),
        'description'   => 'The concept and service of the best luxury hotels in BodhGaya in our sophisticated.',
        'image'         => asset('storage/icon_.ico'),
        'keywords'         => "bodhgaya, Hotel's in bodhgaya , rooms ,Hotel, Hotels, Bodh Gaya, lodging, accommodation, special offers, packages, specials, weekend breaks, city breaks, deals Bodh Gaya India, budget, cheap, discount, savings",
        'author'         => "Snehal Rajvansh",
        'referrer'         => "default",
    ])
    <!-- CSRF Token -->
    <link rel="icon" type="image/png" sizes="6x6" href="{{asset('storage/icon_.ico')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&family=KoHo:ital,wght@0,200;0,300;0,500;0,700;1,200;1,300;1,600;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('vendor/zeus/frontend.css') }}">
    @livewireStyles
    @stack('styles')

    <style>
        * {
            font-family: 'KoHo', 'Almarai', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

{{-- bg-gray-50 text-gray-900 dark:text-gray-100 dark:bg-gray-900 --}}

<body class="font-sans antialiased  @if (app()->isLocal()) debug-screens @endif" style="background-color: #F8F8F8 ">
    {{-- @include('layouts.header') --}}
    @extends('layouts.app')
    @section('content')
        <main>
            
        <div class="slider-area hero-bg1   hero-overly">
            {{-- style="background-image: url({{ $banner ? asset('storage/' . $banner->banner) : asset('img/h1_hero.jpg') }});"> --}}
            <div class="single-slider  slider-height2 d-flex align-items-center" style="min-height: 0px !important;">
                <div class="container">
                    <div class="row justify-content-start ">
                        <div class="col-xl-7 col-lg-11">

                            <div class="hero-caption hero-caption3" style="padding-top: 0px !important;">
                                <h1>Blog</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            {{-- <div class="slider-area hero-bg1   hero-overly"> --}}

            <div class="container mx-auto">
                {{ $slot }}
            </div>

            {{-- </div> --}}
        </main>

        {{-- <footer class="bg-gray-100 dark:bg-gray-800 p-6 mt-20 text-center font-light">
    <a href="https://larazeus.com" target="_blank">
        a gift with ❤️ &nbsp;from @zeus
    </a>
</footer> --}}
    @endsection
    <script src="{{ asset('vendor/zeus/app.js') }}" defer></script>

    @stack('scripts')
    @livewireScripts
    @livewire('notifications')

    <script>
        const theme = localStorage.getItem('theme')

        if ((theme === 'dark') || (!theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        }
    </script>

</body>

</html>

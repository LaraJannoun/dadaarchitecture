<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>DADA | {{ $page_title }}</title>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets_web/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets_web/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets_web/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <meta name="title" content="DADA Architecture">
    <meta name="description" content="DADA Design & Architecture provides a comprehensive range of design-build services including architecture, interior design, landscape design, and contracting.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="image" content="{{ asset('assets_web/images/profile-banner.png') }}">

    <meta property="og:type" content="website">
    <meta property="og:title" content="DADA Architecture">
    <meta property="og:description" content="DADA Design & Architecture provides a comprehensive range of design-build services including architecture, interior design, landscape design, and contracting.">
    <meta property="og:image" content="{{ asset('assets_web/images/profile-banner.png') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="DADA Architecture">
    <meta name="twitter:description" content="DADA Design & Architecture provides a comprehensive range of design-build services including architecture, interior design, landscape design, and contracting.">
    <meta name="twitter:image" content="{{ asset('assets_web/images/profile-banner.png') }}">

    <link rel="icon" type="image/png" href="" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_web/libraries/bootstrap-4.3.1-dist/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_web/libraries/slick-1.8.1/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_web/libraries/slick-1.8.1/slick/slick-theme.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_web/libraries/fontawesome-free-5.15.1-web/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_web/libraries/fontawesome-free-5.15.1-web/css/all.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_web/fonts/lekton/stylesheet.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_web/libraries/animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_web/css/main.min.css') }}" />
</head>

<body>
    <div>
        <div class="all-container">
            @include('web.layouts.headers.header')

            @yield('content')

            @if(!Route::is('home'))
            @include('web.layouts.footers.footer-v2')
            @include('web.layouts.footers.footer')
            @else
            @include('web.layouts.footers.footer')
            @endif
        </div>
    </div>
    <script src="{{ asset('assets_web/libraries/jquery-3.5.1.min.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('assets_web/libraries/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('assets_web/libraries/isotope/isotope.pkgd.min.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('assets_web/libraries/slick-1.8.1/slick/slick.min.js') }}" type="text/javascript" charset="utf-8"></script>
    @stack('script')
    <script src="{{ asset('assets_web/js/main.js') }}" type="text/javascript" charset="utf-8"></script>
</body>

</html>
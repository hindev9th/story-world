<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/plyr.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css" >
    {{--    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">--}}

    <script defer src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script defer src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script defer src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script defer src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script defer src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script defer src="{{ asset('js/mixitup.min.js') }}"></script>
    <script defer src="{{ asset('js/player.js') }}"></script>
    <script defer src="{{ asset('js/main.js') }}"></script>
    <script defer src="{{ asset('js/app.js') }}"></script>
    <title>{{ config('app.name','laravel') }}</title>
</head>
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    @include('frontend.layouts.header')

    @yield('content')

    @include('frontend.layouts.footer')

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

</body>
</html>

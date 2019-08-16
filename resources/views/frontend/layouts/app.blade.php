<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/css/dark.css') }}" type="text/css" />

    <!-- Travel Demo Specific Stylesheet -->
    <link rel="stylesheet" href="{{ asset('theme/css/travel.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/css/datepicker.css') }}" type="text/css" />
    <!-- / -->

    <link rel="stylesheet" href="{{ asset('theme/css/font-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/css/magnific-popup.css') }}" type="text/css" />

    <link rel="stylesheet" href="{{ asset('theme/css/responsive.css') }}" type="text/css" />

    <title>@yield('title',env('APP_NAME'))</title>

</head>
<body class="stretched">
    <div id="wrapper" class="clearfix">
        @yield('content',"")
    </div>
    <!-- External JavaScripts
        ============================================= -->
    <script src="{{ asset('theme/js/jquery.js') }}"></script>
    <script src="{{ asset('theme/js/plugins.js') }}"></script>

    <!-- Travel Demo Specific Script -->
    <script src="{{ asset('theme/js/datepicker.js') }}"></script>
    <!-- / -->

    <!-- Footer Scripts
    ============================================= -->
    <script src="{{ asset('theme/js/functions.js') }}"></script>

    @yield('scripts','')
</body>
</html>

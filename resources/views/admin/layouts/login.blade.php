<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title',env('APP_ADMIN_NAME'))</title>

    <!-- vendor css -->
    <link href="{{asset('admin/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('admin/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">

    <!-- Slim CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/slim.css')}}">
</head>
<body>
<div class="signin-wrapper">

    @yield('content','')

</div><!-- signin-wrapper -->

<script src="{{asset('admin/lib/jquery/js/jquery.js')}}"></script>
<script src="{{asset('admin/lib/popper.js/js/popper.js')}}"></script>
<script src="{{asset('admin/lib/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('admin/js/slim.js')}}"></script>
@yield('scripts','')

</body>
</html>


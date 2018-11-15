<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dasboard AR</title>

    <!-- Scripts -->
    <script src="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}"></script>
    <script src="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}"></script>
    <script src="{{ asset('assets/vendors/nprogress/nprogress.css') }}"></script>
    <script src="{{ asset('assets/vendors/animate.css/animate.min.css') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet">
</head>
<body class='login'>
    @yield('content')
</body>
</html>

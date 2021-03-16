<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('/admins/img/favicon.ico') }}" type="image/x-icon" />
    <title>@yield('title')</title>

    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="{{ asset('/auth/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/auth/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/auth/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/auth/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/auth/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/auth/vendor/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/auth/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/auth/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/auth/css/main.css') }}">
</head>
<body>
    @yield('content')
    
    <script src="{{ asset('/auth/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('/auth/vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('/auth/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('/auth/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/auth/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('/auth/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('/auth/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('/auth/vendor/countdowntime/countdowntime.js') }}"></script>
    <script src="{{ asset('/auth/js/main.js') }}"></script>
    {{-- <script src="{{ asset('/admins/vendors/validate/jquery.validate.js') }}"></script> --}}
    <script src="{{ asset('/admins/vendors/validate/additional-methods.js') }}"></script>
    <script src="{{ asset('/admins/vendors/validate/messages_es.js') }}"></script>
    <script src="{{ asset('/admins/js/validate.js') }}"></script>
</body>
</html>
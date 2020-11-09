<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('assets/css/font-awesome-4.6.1/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/util.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />

    @yield('styles')
</head>
<body>
            
    @yield('content')
            
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
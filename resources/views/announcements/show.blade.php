<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">

    <title>FCYT</title>
    <link rel="icon" href="favicon.png" type="image/png">
    <link rel="shortcut icon" href="favicon.ico" type="img/x-icon">

    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/home/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/font-awesome-4.6.1/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/home/owl.carousel.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/home/owl.theme.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/home/styles.css') }}" rel="stylesheet" type="text/css">

    <script src="{{ asset ('assets/js/home/modernizr.custom.32033.js') }}"></script>
</head>
<body>
    <div class="pre-loader">
        <div class="load-con">
            <img src="{{ asset('img/log.png') }}" class="animated fadeInDown" alt="">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    </div>

    <!-- Wrap all page content here -->
    <div id="wrap">
        <header class="masthead">
            <!-- Fixed navbar -->
            <div class="navbar navbar-static-top" id="nav" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <i class="fa fa-align-justify"></i>
                        </button>
                        <a class="navbar-brand" href="#">
                            <img src="{{ asset('img/log.png') }}" alt="">
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav social hidden-xs hidden-sm">
                            <li><a href="#"><i class="fa fa-google-plus fa-lg fa-fw"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter fa-lg fa-fw"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook fa-lg fa-fw"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest fa-lg fa-fw"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin fa-lg fa-fw"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="#slider">Inicio</a></li>
                            <li><a href="#features">Caracteristicas</a></li>
                            <li><a href="#announcements">Ultimas Convocatorias</a></li>
                            <li><a href="{{ url('/announcements') }}">Convocatorias</a></li>
                            <li><a href="#contact">Contactar</a></li>
                            @if(!Auth::check())
                                <li><a href="{{ url('/login') }}">Login</a></li>
                            @else
                                <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            @endif
                            {{-- <li><a href="{{ url('/register') }}">Registrarse</a></li> --}}
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!--/.container -->
            </div>
            <!--/.navbar -->
        </header>

        <main>
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">hola</h1>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('assets/js/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/home/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/home/waypoints.min.js') }}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&sensor=false"></script>
    <script src="{{ asset('assets/js/home/script.js') }}"></script>
    <script>
        $(document).ready(function() {
            appMaster.preLoader();
        });
    </script>
</body>
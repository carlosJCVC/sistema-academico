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
            <img src="{{ asset('logo.png') }}" class="animated fadeInDown" alt="">
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
            <div class="slider-container" id="slider">
                <div class="container">
                    <div class="row mh-container">
                        <h1 style="margin-top: 150px"><span>Bienvenidos</span></h1>
                        <h3>SISTEMA DE REGISTRO DE ASISTENCIA Y AVANCE DE MATERIAS</h3>
                        {{--
                        <div class="col-md-4 col-md-push-4">
                            <div class="btn-group btn-group-justified btn-lg small">
                                <div class="btn-group">
                                    <a href="javascript:void(0)" class="btn btn-default scrollpoint sp-effect6">
                                        <span class="apple"></span>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-default scrollpoint sp-effect6">
                                        <span class="play"></span>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-default scrollpoint sp-effect6">
                                        <span class="android"></span>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-default scrollpoint sp-effect6">
                                        <span class="windows"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        --}}

                        <div class="col-md-10 col-md-push-1 hidden-xs mh-slider">
                            <div class="row">
                                <div class="col">
                                    <div class="jumbotron py-1" style="margin-bottom: 0;">
                                        <h4 class="dispay-5">
                                            Sistema de colaboracion para el seguimiento de informes de las clases en 
                                            <strong class="text-uppercase" style="color: #de5749;">Universidad Mayor de San Simon</strong>.
                                        </h4>
                                    </div>
                                    <hr class="my-2">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div id="carousel-slider" class="carousel slide" data-ride="carousel">

                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <img src="{{ asset('assets/images/logoumss.png') }}" alt="..." style="height: 300px" class="img-responsive">
                                            </div>
                                            <!--
                                            <div class="item">
                                                <img src="{{ asset('assets/images/logo-fcyt.png') }}" alt="..." style="height: 350px" class="img-responsive">
                                            </div>
                                            -->
                                        </div>

                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#carousel-slider" role="button" data-slide="prev">
                                            <span class="slider-left"></span>
                                        </a>
                                        <a class="right carousel-control" href="#carousel-slider" role="button" data-slide="next">
                                            <span class="slider-right"></span>
                                        </a>
                                    </div>

                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fixed navbar -->
            <div class="navbar navbar-static-top" id="nav" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <i class="fa fa-align-justify"></i>
                        </button>
                        <a class="navbar-brand" href="#">
                            <img src="{{ asset('logo.png') }}" alt="" class="rounded" style="height: 70px">
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav social hidden-xs hidden-sm">
                            {{-- <li><a href="javascript:void(0)"><i class="fa fa-google-plus fa-lg fa-fw"></i></a></li> --}}
                            {{-- <li><a href="#"><i class="fa fa-twitter fa-lg fa-fw"></i></a></li> --}}
                            {{-- <li><a href="#"><i class="fa fa-facebook fa-lg fa-fw"></i></a></li> --}}
                            {{-- <li><a href="#"><i class="fa fa-pinterest fa-lg fa-fw"></i></a></li> --}}
                            {{-- <li><a href="#"><i class="fa fa-linkedin fa-lg fa-fw"></i></a></li> --}}
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="#slider">Inicio</a></li>
                            {{-- <li><a href="#features">Caracteristicas</a></li> --}}
                            {{-- <li><a href="#announcements">Ultimas Convocatorias</a></li> --}}
                            {{-- <li><a href="{{ url('/announcements') }}">Convocatorias</a></li> --}}
                            {{-- <li><a href="{{ route('home.publishes') }}">Publicaciones</a></li> --}}
                            {{-- <li><a href="#avisos">Avisos</a></li> --}}
                            @if(!Auth::check())
                                <li><a href="{{ url('/login') }}">Login</a></li>
                            @else
                                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
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

        {{-- <section id="announcements">
            <div class="container">
                <div id="carousel-team" class="carousel slide" data-ride="carousel">
                    <div class="row">
                        <div class="col-md-2 hidden-xs">
                            <a class="car-prev" href="#carousel-team" role="button" data-slide="prev">
                                <i class="fa fa-chevron-left fa-2x"></i>
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="section-heading scrollpoint sp-effect3">
                                <h3>Convocatorias<span> postulate ya !!</span></h3>
                                <span class="divider"></span>
                                <p>nuevas postulaciones , postulate al area que mas te agrade. lee atentamente tos requisitos para poder ser aceptado de manera efectiva!</p>
                            </div>
                        </div>
                        <div class="col-md-2 hidden-xs">
                            <a class="car-next" href="#carousel-team" role="button" data-slide="next">
                                <i class="fa fa-chevron-right fa-2x"></i>
                            </a>
                        </div>
                    </div>

                    <div class="carousel-inner">

                        @for($i=1; $i <= 2; $i++)
                            <div class="item {{ $i == 1 ? 'active': '' }}">
                                @foreach($announcements->chunk(2) as $items)
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @foreach($items as $item)
                                                    @include('partials.member', [ 'announcement' => $item ])
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endfor

                    </div>
                </div>
            </div>
        </section> --}}

        {{-- <section id="avisos">
            <div class="container">
                <div id="carousel-team" class="carousel slide" data-ride="carousel">
                    <div class="row">
                        <div class="col-md-2 hidden-xs">
                            <a class="car-prev" href="#carousel-team" role="button" data-slide="prev">
                                <i class="fa fa-chevron-left fa-2x"></i>
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="section-heading scrollpoint sp-effect3">
                                <h3>Avisos<span> importantes !!</span></h3>
                                <span class="divider"></span>
                                <p>ultimos avisos y noticias!</p>
                            </div>
                        </div>
                        <div class="col-md-2 hidden-xs">
                            <a class="car-next" href="#carousel-team" role="button" data-slide="next">
                                <i class="fa fa-chevron-right fa-2x"></i>
                            </a>
                        </div>
                    </div>

                    <div class="carousel-inner">
                        
                        @for($i=1; $i <= 2; $i++)
                            <div class="item {{ $i == 1 ? 'active': '' }}">
                                @foreach($avisos->chunk(2) as $items)
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @foreach($items as $item)
                                                    @include('partials.avisoItem', [ 'aviso' => $item ])
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endfor

                    </div>
                </div>
            </div>
        </section> --}}

        <footer id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-push-2 clearfix">
                        <div class="section-heading scrollpoint sp-effect3">
                            <h3>Contactanos<span> envianos tu mensaje</span></h3>
                            <span class="divider"></span>
                                <p>Si le das a alguien un programa, lo frustrarás un día. Si le enseñas a programar, lo frustrarás toda la vida.</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <form role="form" method="POST" action="{{ route('messages.store') }}">
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 spirat">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Tu nombre" required>
                                        </div>
                                        {!! $errors->first('name', "<span class=rights>:message</span>") !!}
                                    </div>
                                    <div class="col-md-6 spirat">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Tu correo" required>
                                        </div>
                                        {!! $errors->first('email', "<span class=rights>:message</span>") !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" name="body" class="form-control" placeholder="Tu mensaje" required>
                                    <span class="input-group-btn">
                                        <button class="btn" style="outline: none;">Enviar tu mensaje</button>
                                    </span>
                                </div>
                                {!! $errors->first('body', "<span class=rights>:message</span>") !!}
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <div class="social">
                            <ul>
                                <li><a href="#"><i class="fa fa-google-plus fa-lg"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter fa-lg"></i></a></li>
                                <li><a href="https://es-la.facebook.com/umss.cbba.3/"><i class="fa fa-facebook fa-lg"></i></a></li>
                                <li>
                                    <a href="http://fcyt.umss.edu.bo/">
                                        <img src="{{ asset('assets/images/logo-fcyt.png') }}" alt="..." class="img-responsive">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <p class="rights">
                            2021 <span>UMSS</span> Developed by <a href="#"><span>digitaldevelopment@mail.com</span></a>
                        </p>
                    </div>
                    <div class="col-md-12 bg-dark">
                        <div class="rights">
                            <ul>
                                <li>
                                    <a href="http://www.umss.edu.bo/"><b>UMSS</b></a>|
                                    <a href="http://websis.umss.edu.bo/"><b>WEBSIS</b></a>|
                                    <a href="http://www.fcyt.umss.edu.bo/"><b>FCyT</b></a>|
                                    <a href="http://www.cs.umss.edu.bo/"><b>CS UMSS</b></a>|
                                    <a href="https://www.facebook.com/memiumss"><b>MEMI</b></a>|
                                    <a href="http://enlinea.umss.edu.bo/"><b>Plataformas Virtuales</b></a>
                                </li>
                            </ul>
                        </div>
                        <div class="rights">
                            <b>Contacto:</b><br>
                            <a href="mailto:dir.inf@umss.edu.bo">Direccion de carrera de Informatica - correo</a><br>
                            <a href="mailto:direccion.sistemas@fcyt.umss.edu.bo">Direccion de carrea de Sistemas - correo</a><br> 
                            <b>teléfono:</b><span> (591)-(4)233719<br>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
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
</html>

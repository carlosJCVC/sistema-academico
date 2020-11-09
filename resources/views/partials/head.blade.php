 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>{{ config('app.name', 'Meritos') }}  @yield('title')</title>
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

 <!-- Bootstrap 3.3.4 -->
 <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />

 <link href="{{ asset('/font-awesome-4.6.1/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />

 <!-- Ionicons -->
 <link href="{{ asset('/ionicons-2.0.1/ionicons-2.0.1/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />

 <!-- Theme style -->
 <link href="{{ asset('/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />

 <link href="{{ asset('/css/skins/skin-blue.css') }}" rel="stylesheet" type="text/css" />

 <!-- iCheck -->
 <link href="{{ asset('/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />
 <link href="{{ asset('js/jquery-multi-select/css/multi-select.css') }}" rel="stylesheet" />

 <!-- estilos aumentado -->
 <link href="{{ asset('/css/estilos.css') }}" rel="stylesheet" type="text/css" />

 @yield('styles')
@extends('auth.layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('styles')
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="limiter">
  <div class="container-login100">
      <div class="wrap-login100">
          <!--<div class="login100-pic js-tilt" data-tilt>
              <img src="{{ asset('assets/images/logotec.jpg') }}" alt="IMG">
              <p>Cochabamba-Bolivia</p>
          </div>-->

          <form class="login100-form validate-form" action="{{ route('login') }}" method="POST">
            {{ csrf_field() }}

            <span class="login100-form-title">
              INICIAR SESION
            </span>

            <div class="wrap-input100 validate-input {{ $errors->has('email')? 'alert-validate' : '' }}" data-validate="{{ $errors->has('email')? 'E-mail o contraseña es incorrecto' : 'E-mail es requerido' }}">
              <input class="input100" type="text" name="email" placeholder="Email" value0="{{ old('email') }}">
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-envelope" aria-hidden="true"></i>
              </span>
            </div>

            <div class="wrap-input100 validate-input {{ $errors->has('password')? 'alert-validate' : '' }}" data-validate="{{ $errors->has('password')? $errors->first('password') : 'Password es requerido' }}">
              <input class="input100" type="password" name="password" placeholder="Password">
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-lock" aria-hidden="true"></i>
              </span>
            </div>
            
            <div class="container-login100-form-btn">
              <button class="login100-form-btn">
                Ingresar
              </button>
            </div>

            <!--<div class="text-center p-t-12">
              <span class="txt1">
                Forgot
              </span>
              <a class="txt2" href="{{ route('auth.reset_password') }}">
                Username / Password?
              </a>
            </div>

            <div class="text-center p-t-136">
              {{-- <a class="txt2" href="{{ route('postulans.create') }}"> --}}
                <span style="color: #222d32">cbbasoft@gmail.com</span>
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
              {{-- </a> --}}
            </div>-->
          </form>
      </div>
  </div>
</div>

@endsection

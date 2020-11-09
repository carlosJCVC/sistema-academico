@extends('auth.layouts.auth')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form class="login100-form validate-form" action="{{ route('password.request') }}" method="POST">

        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">

        <span class="login100-form-title">
            Reset Password
        </span>

        <div class="wrap-input100 validate-input {{ $errors->has('email')? 'alert-validate' : '' }}" data-validate="{{ $errors->has('email')? $errors->first('email') : 'Password es requerido' }}">
            <input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
        </div>

        <div class="wrap-input100 validate-input {{ $errors->has('password')? 'alert-validate' : '' }}" data-validate="{{ $errors->has('password')? $errors->first('password') : 'Password es requerido' }}">
            <input class="input100" type="password" name="password" placeholder="Password" value="{{ old('password') }}">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
        <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
        </div>

        <div class="wrap-input100 validate-input {{ $errors->has('password_confirmation')? 'alert-validate' : '' }}" data-validate="{{ $errors->has('password_confirmation')? $errors->first('password_confirmation') : 'Password es requerido' }}">
            <input class="input100" type="text" name="password_confirmation" placeholder="Confirm password" value="{{ old('password_confirmation') }}">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
        </div>

        <div class="container-login100-form-btn">
            <button class="login100-form-btn">
                Login
            </button>
        </div>

        <div class="text-center p-t-136">
            <a class="txt2" href="{{ route('auth.register') }}">
                Create your Account
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
        </div>
    </form>
@endsection

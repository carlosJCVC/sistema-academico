@extends('auth.layouts.auth')

@section('htmlheader_title')
    Register
@endsection

@section('styles')
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/template.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <span class="login100-form-title">
                REGISTRARSE - {{$announcement->title}}
            </span>

            <form class="form-horizontal" action="{{ route('postulans.stores', [ 'announcement' => $announcement ]) }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <div class="wrap-input100 validate-input {{ $errors->has('name')? 'alert-validate' : '' }}" data-validate="{{ $errors->has('name')? $errors->first('name') : 'Nombre completo es requerido' }}">
                            <input class="input100" type="text" name="name" placeholder="Nombres"  value="{{ old('name')}}">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="wrap-input100 validate-input {{ $errors->has('lastname')? 'alert-validate' : '' }}" data-validate="{{ $errors->has('lastname')? $errors->first('lastname') : 'Apellidos es requerido' }}">
                            <input class="input100" type="text" name="lastname" placeholder="Apellidos"  value="{{ old('lastname')}}">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="wrap-input100 validate-input {{ $errors->has('ci')? 'alert-validate' : '' }}" data-validate="{{ $errors->has('ci')? $errors->first('ci') : 'C.I. es requerido' }}">
                            <input class="input100" type="text" name="ci" placeholder="Carnet Identidad"  value="{{ old('ci')}}">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-list" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="wrap-input100 validate-input {{ $errors->has('cod_sis')? 'alert-validate' : '' }}" data-validate="{{ $errors->has('cod_sis')? $errors->first('cod_sis') : 'Cod. SIS es requerido' }}">
                            <input class="input100" type="text" name="cod_sis" placeholder="Codigo SIS"  value="{{ old('cod_sis')}}">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="wrap-input100 validate-input {{ $errors->has('gender')? 'alert-validate' : '' }}" data-validate="{{ $errors->has('gender')? $errors->first('gender') : 'Este es requerido' }}">
                            <select class="input100 {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" type="text">
                                <option disabled hidden selected>Seleccione sexo</option>
                                <option value="M" {{ ( old('gender', isset($user) && $user->gender == 'M') ? 'selected' : '') }}>MASCULINO</option>
                                <option value="F" {{ ( old('gender', isset($user) && $user->gender == 'F') ? 'selected' : '') }}>FEMENINO</option>
                            </select>

                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-users" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="wrap-input100 validate-input {{ $errors->has('address')? 'alert-validate' : '' }}" data-validate="{{ $errors->has('address')? $errors->first('address') : 'Direccion es requerido' }}">
                            <input class="input100" type="text" name="address" placeholder="Direccion"  value="{{ old('address')}}">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-thumb-tack" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="wrap-input100 validate-input {{ $errors->has('email')? 'alert-validate' : '' }}" data-validate="{{ $errors->has('email')? $errors->first('email') : 'E-mail valido es requerido: example@abc.xyz' }}">
                            <input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="wrap-input100 validate-input {{ $errors->has('phone')? 'alert-validate' : '' }}" data-validate="{{ $errors->has('phone')? $errors->first('phone') : 'Telefono es requerido' }}">
                            <input class="input100" type="text" name="phone" placeholder="Telefono/Celular"  value="{{ old('phone')}}">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="wrap-input100 validate-input {{ $errors->has('nro_docs')? 'alert-validate' : '' }}" data-validate="{{ $errors->has('nro_docs')? $errors->first('nro_docs') : 'Nro de documentos es requerido' }}">
                            <input class="input100" type="text" name="nro_docs" placeholder="Nro de documentos"  value="{{ old('nro_docs')}}">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-archive" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="wrap-input100 validate-input {{ $errors->has('nro_certificates')? 'alert-validate' : '' }}" data-validate="{{ $errors->has('nro_certificates')? $errors->first('nro_certificates') : 'Nro de certificados es requerido' }}">
                            <input class="input100" type="text" name="nro_certificates" placeholder="Nro de certificados"  value="{{ old('nro_certificates')}}">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-archive" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <div class="wrap-input100 validate-input {{ $errors->has('item_id')? 'alert-validate' : '' }}" data-validate="{{ $errors->has('item_id')? $errors->first('item_id') : 'Este es requerido' }}">
                            <select class="input100 {{ $errors->has('item_id') ? 'is-invalid' : '' }}" name="item_id" type="text">
                                <option disabled hidden selected>Seleccione item</option>
                                @foreach($items as $item)
                                    <option value="{{ $item->id }}" {{ (isset($announcement) && $item->id == $announcement->item_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>

                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-users" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Register
                        </button>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="{{ url('/login') }}">
                            I already have a membership
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

    @include('auth.scripts')
</body>

@endsection

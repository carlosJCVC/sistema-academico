@extends('auth.layouts.auth')

@section('htmlheader_title')
    Mostrar
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
                Información de postulante
            </span>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <p class="card-title text-white"> Nombre : <span>{{$postulant->lastname}} {{$postulant->name}}</span></p>
                </div>

                <div class="col-md-6 mb-3">
                    <p class="card-title text-white"> Carnet Identidad : <span>{{$postulant->ci}}</span></p>
                </div>

                <div class="col-md-6 mb-3">
                    <p class="card-title text-white"> Item : <span>{{$item->name}}</span></p>
                </div>

                <div class="col-md-6 mb-3">
                    <p class="card-title text-white"> Codigo Item : <span>{{$item->code}}</span></p>
                </div>

                <div class="col-md-6 mb-3">
                    <p class="card-title text-white"> Codigo SIS : <span>{{$postulant->cod_sis}}</span></p>
                </div>

                <div class="col-md-6 mb-3">
                    <p class="card-title text-white"> E-Mail : <span>{{$postulant->email}}</span></p>
                </div>

                <div class="col-md-6 mb-3">
                    <p class="card-title text-white"> Telefono/Celular : <span>{{$postulant->phone}}</span></p>
                </div>

                <div class="col-md-6 mb-3">
                    <p class="card-title text-white"> Genero : <span>{{($postulant->gender == 'M')? 'MASCULINO' : 'FEMENINO' }}</span></p>
                </div>

                <div class="col-md-6 mb-3">
                    <p class="card-title text-white"> Direccion : <span>{{$postulant->address}}</span></p>
                </div>

                <div class="col-md-6 mb-3">
                    <p class="card-title text-white"> Nombre auxiliatura : <span>{{$postulant->auxiliar_name}}</span></p>
                </div>

                <div class="col-md-6 mb-3">
                    <p class="card-title text-white"> Nro de documentos : <span>{{$postulant->nro_docs}}</span></p>
                </div>

                <div class="col-md-6 mb-3">
                    <p class="card-title text-white"> Nro de certificados : <span>{{$postulant->nro_certificates}}</span></p>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="container-login100-form-btn">
                        <a href="{{route('postulans.print', ['postulant' => $postulant->id])}}" class="login100-form-btn text-white">
                            IMPRIMIR
                        </a>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="container-login100-form-btn">
                        <a href="{{ route('home') }}" class="cancel100-form-btn text-white">
                            SALIR
                        </a>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="container-login100-form-btn">
                        <a href="{{ route('postulans.edit', ['announcement' => $announcement->id, 'postulant' => $postulant->id]) }}" class="cancel100-form-btn text-white">
                            VOLVER
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

    @include('auth.scripts')
</body>

@endsection

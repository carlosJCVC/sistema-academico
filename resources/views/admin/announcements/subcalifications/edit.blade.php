@extends('admin.layouts.app')

@section('htmlheader_title')
    Calificaciones
@endsection

@section('styles')
    <link href="{{ asset('assets/css/font-awesome-4.6.1/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/util.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-edit"></i>Editar Calificación de conocimiento - {{ $calification->title }}</div>
                    <div class="card-body">

                        <form class="form-horizontal" action="{{ route('admin.subcalifications.update', [ 'calification' => $calification->id, 'subcalification' => $subcalification ] ) }}" method="POST" autocomplete="off">
                            {{ method_field('PUT')}}
                            {{ csrf_field() }}

                            @include('admin.announcements.subcalifications.form')

                            <div class="form-actions text-center">
                                <button class="btn btn-outline-primary" type="submit">Actualizar</button>
                                <a class="btn btn-outline-danger" href="{{ route('admin.data.index', [ 'announcement' => $announcement->id ]) }}">Cancelar</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('admin.layouts.app')

@section('htmlheader_title')
    Horario
@endsection

@section('styles')
    <link href="{{ asset('assets/css/font-awesome-4.6.1/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/util.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('content')

    <div class="animated fadeIn mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-edit"></i>Editar horario</div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.schedules.update', [ 'schedule' => $schedule ]) }}" method="POST">
                            {{ method_field('PUT')}}
                            {{ csrf_field() }}

                            @include('admin.schedules.form')

                            <div class="form-actions text-center">
                                @can('edit schedules')
                                <button class="btn btn-outline-primary" type="submit">Actualizar</button>
                                @endcan
                                <a class="btn btn-outline-danger" href="{{ route('admin.schedules.index', [ 'schedule' => $schedule ]) }}">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- /.row-->
    </div>

@endsection
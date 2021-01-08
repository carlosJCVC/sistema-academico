@extends('admin.layouts.app')

@section('htmlheader_title')
    Horario
@endsection

@section('styles')
    <link href="{{ asset('assets/css/font-awesome-4.6.1/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/util.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css" />
        <style>
        .select2.select2-container.select2-container--default {
            width: 100% !important;
        }
        .select2-selection {
            height: 100% !important;
        }
    </style>
@endsection

@section('content')

    <div class="animated fadeIn mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-edit"></i>Crear horario</div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.schedules.store') }}" method="POST">
                            {{ csrf_field() }}

                            @include('admin.schedules.form')

                            <div class="form-actions text-center">
                                @can('create schedules')
                                <button class="btn btn-outline-primary" type="submit">Guardar</button>
                                @endcan
                                <a class="btn btn-outline-danger" href="{{ route('admin.schedules.index') }}">Cancelar</a>
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
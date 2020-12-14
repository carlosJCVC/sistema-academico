@extends('admin.layouts.app')

@section('htmlheader_title')
    Area
@endsection

@section('styles')
    <link href="{{ asset('assets/css/font-awesome-4.6.1/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/util.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="animated fadeIn mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-edit"></i>Crear area</div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.areas.store', ['academic' => $academic->id]) }}" method="POST">
                            {{ csrf_field() }}

                            @include('admin.areas.form')

                            <div class="form-actions text-center">
                                @can('create areas')
                                <button class="btn btn-outline-primary" type="submit">Guardar</button>
                                @endcan
                                <a class="btn btn-outline-danger" href="{{ route('admin.areas.index', [ 'academic' => $academic->id ]) }}">Cancelar</a>
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
@extends('admin.layouts.app')

@section('htmlheader_title')
    Unidad Academica
@endsection

@section('styles')
    <link href="{{ asset('assets/css/font-awesome-4.6.1/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/util.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}" />
@endsection

@section('content')

    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-edit"></i>Editar Unidad Academica</div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.academics.update', $academic->id) }}" method="POST">
                            {{ method_field('PUT')}}
                            {{ csrf_field() }}

                            @include('admin.academics.form')

                            <div class="form-actions text-center">
                                <button class="btn btn-outline-primary" type="submit">Actualizar</button>
                                <a class="btn btn-outline-danger" href="{{ route('admin.academics.index') }}">Cancelar</a>
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
@extends('admin.layouts.app')

@section('htmlheader_title')
    Grupo Materia
@endsection

@section('styles')
    <link href="{{ asset('assets/css/font-awesome-4.6.1/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/util.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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

    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-edit"></i>Editar Grupo de materia</div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.asignature-group.update', [ 'id' => $group->id]) }}" method="POST">
                            {{ method_field('PUT')}}
                            {{ csrf_field() }}

                            @include('admin.asignature-groups.form2')

                            <div class="form-actions text-center">
                                @can('edit groups')
                                <button class="btn btn-outline-primary" type="submit">Actualizar</button>
                                @endcan
                                <a class="btn btn-outline-danger" href="{{ route('admin.asignature-group.index') }}">Cancelar</a>
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
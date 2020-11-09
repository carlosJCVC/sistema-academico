@extends('admin.layouts.app')

@section('htmlheader_title')
    Usuario
@endsection

@section('styles')
    <link href="{{ asset('assets/css/font-awesome-4.6.1/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/util.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-edit"></i>Editar usuario</div>
                    <div class="card-body">

                            <form class="form-horizontal" action="{{ route('admin.users.update', $user->id) }}" method="POST" autocomplete="off">
                                {{ method_field('PUT')}}
                                {{ csrf_field() }}

                                <div class="box-solid">
                                    @include('admin.users.form')
                                </div>

                                <div class="form-actions text-center">
                                    <button class="btn btn-outline-primary" type="submit">Actualizar</button>
                                    <a class="btn btn-outline-danger" href="{{ route('admin.users.index') }}">Cancelar</a>
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

@section('scripts')
    <script>
        $('.js-example-basic-multiple').select2({
                placeholder: "Seleccione un valor",
                allowClear: true
            });
    </script>
@endsection
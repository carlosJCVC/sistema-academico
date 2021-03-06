@extends('admin.layouts.app')

@section('htmlheader_title')
    Aviso
@endsection

@section('styles')
    <link href="{{ asset('assets/css/font-awesome-4.6.1/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/util.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/dropify/css/dropify.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dropify/css/demo.css') }}">
@endsection

@section('content')

    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-edit"></i>Editar aviso</div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.avisos.update', [ 'aviso' => $aviso ]) }}" method="POST" enctype="multipart/form-data">
                            {{ method_field('PUT')}}
                            {{ csrf_field() }}

                            @include('admin.avisos.form')

                            <div class="form-actions text-center">
                                <button class="btn btn-outline-primary" type="submit">Actualizar</button>
                                <a class="btn btn-outline-danger" href="{{ route('admin.avisos.index') }}">Cancelar</a>
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
    <script src="{{ asset('assets/dropify/js/dropify.js') }}"></script>

    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Arrastra y suelta un archivo aquí o haz clic',
                'replace': 'Arrastra y suelta o haz clic para reemplazar',
                'remove':  'Eliminar',
                'error':   'Vaya, algo malo sucedió.'
            }
        });
    </script>
@endsection
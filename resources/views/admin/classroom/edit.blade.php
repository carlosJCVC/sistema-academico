@extends('admin.layouts.app')

@section('htmlheader_title')
    Clases de reposicion
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

    <div class="animated fadeIn">
        <div class="row  mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-edit"></i>Editar clase de reposicion</div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.classes-reposiciones.update', [ 'id' => $classe->id]) }}" method="POST">
                            {{ method_field('PUT')}}
                            {{ csrf_field() }}

                            @include('admin.classroom.form')

                            <div class="form-actions text-center">
                                @can('edit classroom')
                                <button class="btn btn-outline-primary" type="submit">Actualizar</button>
                                @endcan
                                <a class="btn btn-outline-danger" href="{{ route('admin.classes-reposiciones.index') }}">Cancelar</a>
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
     const tmp = {
        lang: {
            days: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
            months: [
                'Enero',
                'Febrero',
                'Marzo',
                'Abril',
                'Mayo',
                'Junio',
                'Julio',
                'Agosto',
                'Septiembre',
                'Octubre',
                'Noviembre',
                'Diciembre',
            ],
            today: 'Hoy',
            clear: 'Limpiar',
            close: 'Cerrar',
        },
        mode: 'dp-below',
    };

    TinyDatePicker('#date_suspended', tmp);
    TinyDatePicker('#date_reposition', tmp);
    
    $('.select2').select2({
        placeholder: "Seleccione un valor",
        allowClear: true,
    });
    </script>
@endsection
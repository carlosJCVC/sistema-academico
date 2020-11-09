@extends('admin.layouts.app')

@section('htmlheader_title')
    Usuario
@endsection

@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-edit"></i>Crear usuario</div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.users.store') }}" method="POST">
                            {{ csrf_field() }}

                            @include('admin.users.form')

                            <div class="form-actions text-center">
                                <button class="btn btn-outline-primary" type="submit">Guardar</button>
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
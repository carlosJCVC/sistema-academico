@extends('admin.layouts.app')

@section('htmlheader_title')
    COnvocatoria
@endsection


@section('content')
<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i> Convocatoria : {{ $announcement->title }}
    </div>
    <div class="card-body">
        <div class="row">
            <table class="table table-striped table-hover">
                <tbody>
                    <tr>
                        <div class="col-md-6">
                            <td><p><b>Titulo : </b> <span>{{ $announcement->title }}</span></p></td>
                        </div>
                        <div class="col-md-6">
                            <td><p><b>Gestión : </b> <span>{{ $announcement->gestion }}</span></p></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="col-md-6">
                            <td><p><b>Unidad Academica : </b> <span>{{ $announcement->academic_id }}</span></p></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="col-md-6">
                            <td><p><b>Fecha de Inicio : </b> <span>{{ $announcement->start_date_announcement }}</span></p></td>
                        </div>
                        <div class="col-md-6">
                            <td><p><b>Fecha Fin : </b> <span>{{ $announcement->end_date_announcement }}</span></p></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="col-md-6">
                            <td><p><b>Fecha de Calificación : </b> <span>{{ $announcement->start_date_calification }}</span></p></td>
                        </div>
                        <div class="col-md-6">
                            <td><p><b>Fecha Fin de Calificación : </b> <span>{{ $announcement->end_date_calification }}</span></p></td>
                        </div>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="text-center">
            <a href="{{ route('admin.announcements.index') }}" class="btn btn-outline-primary">Volver</a>
        </div>

    </div>
</div>
@endsection

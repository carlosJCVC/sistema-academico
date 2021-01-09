@extends('admin.layouts.app')

@section('htmlheader_title')
PLANILLA - Asistencia y Avance
@endsection


@section('content')

    <div class="card mt-3">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> PLANILLA - Asistencia y Avance
            <a class="btn btn-secondary" href="{{ route('admin.asistencia-avance.planillas') }}">
                <i class="icon-arrow-left"></i>&nbsp;Volver
            </a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <span class="text-muted">docente/auxiliar</span><h5 class="card-title">{{ $teacher->fullname }}</h5>
                    <span class="text-muted">codigo sis</span><p class="card-text">{{ $teacher->cod_sis}}</p>
                </div>
                <div class="col-md-6">
                    <span class="text-muted">gestion</span><p class="card-text">{{ $gestion}}</p>
                    <span class="text-muted">rango consulta</span><p class="card-text">{{ $rango}}</p>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if($reports->isNotEmpty())
            <table class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    <th>Fecha</th>
                    {{-- <th>Horario</th> --}}
                    <th>Materia</th>
                    <th>Grupo</th>
                    <th>Contenido-clase</th>
                    <th>Plataformas</th>
                    <th>Observaciones</th>
                    <th>opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reports as $report)
                    <tr>
                        <td>{{ $report->formatDate() }}</td>
                        {{-- <td>{{ $report->formatSchedule() }}</td> --}}
                        <td class="text-capitalize">{{ $report->getAsignature()->name }}</td>
                        <td>{{ $report->getGroup()->group }}</td>
                        <td>{{ $report->bodyclass }}</td>
                        <td>{{ $report->resourcesbody }}</td>
                        <td>{{ $report->observations }}</td>
                        <td>
                            @if($report->has_file)
                                <a class="btn btn-link btn-sm" href="{{ $report->getUrlFile() }}" download="{{ $report->filename }}">
                                    <i class="icon-doc"></i>
                                </a>&nbsp;
                            @endif
                        </td>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7">
                            <button class="btn bg-dark text-white" type="button">
                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;Descargar
                            </button>
                        </td>
                    </tr>
                </tfoot>
            </table>
            @else
                <h5 class="card-title">No hay reportes.</h5>
            @endif
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <a class="btn btn-secondary" href="{{ route('admin.asistencia-avance.planillas') }}">
                        <i class="icon-arrow-left"></i>&nbsp;Volver
                    </a>
                </div>    
            </div>
        </div>
    </div>
    
@endsection

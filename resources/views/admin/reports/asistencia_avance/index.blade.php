@extends('admin.layouts.app')

@section('htmlheader_title')
Asistencia y Avance
@endsection


@section('content')

    <div class="card mt-3">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Asistencia y Avance
            <a class="btn btn-secondary" href="{{ route('admin.asistencia-avance.create') }}">
                <i class="icon-plus"></i>&nbsp;Nuevo
            </a>
        </div>
        <div class="card-body">
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
                            <a class="btn btn-warning btn-sm" href="{{ route('admin.asistencia-avance.edit', [ 'id' => $report->id]) }}">
                                <i class="icon-pencil"></i>
                            </a> &nbsp;
                            <form action="{{ route('admin.asistencia-avance.destroy', [ 'id' => $report->id]) }}"
                                  style="display:inline-block;"
                                  method="POST">

                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="button" class="btn btn-danger btn-sm"
                                        onclick="delete_action(event);">
                                    <i class="icon-trash penone"></i>
                                </button>
                            </form>
                        </td>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection

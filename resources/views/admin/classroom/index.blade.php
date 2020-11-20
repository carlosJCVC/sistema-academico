@extends('admin.layouts.app')

@section('htmlheader_title')
Clases de reposicion
@endsection


@section('content')

    <div class="card mt-3">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Clases de reposicion
            <a class="btn btn-secondary" href="{{ route('admin.classes-reposiciones.create') }}">
                <i class="icon-plus"></i>&nbsp;Nuevo
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    <th class="text-center">Docente/Auxiliar</th>
                    <th class="text-center">Materia</th>
                    <th class="text-center">Fecha (suspendido)</th>
                    <th class="text-center">Motivo/Justificacion</th>
                    <th class="text-center">Fecha (reposicion)</th>
                    <th class="text-center">Horario (reposicion)</th>
                    <th class="text-center">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($classes as $clase)
                    <tr class="text-center">
                        <td>{{ $clase->formatTeacher() }}</td>
                        <td>{{ $clase->formatAsignature() }}</td>
                        <td>{{ $clase->formatDateSuspended() }}</td>
                        <td>{{ $clase->reason }}</td>
                        <td>{{ $clase->formatDateReposition() }}</td>
                        <td>{{ $clase->formatSchedule() }}</td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="{{ route('admin.classes-reposiciones.edit', [ 'id' => $clase->id]) }}">
                                <i class="icon-pencil"></i>
                            </a> &nbsp;
                            <form action="{{ route('admin.classes-reposiciones.destroy', [ 'id' => $clase->id]) }}"
                                  style="display:inline-block;"
                                  method="POST">

                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="button" class="btn btn-danger btn-sm"
                                        onclick="delete_action(event);">
                                    <i class="icon-trash"></i>
                                </button>
                            </form>
                        </td>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection

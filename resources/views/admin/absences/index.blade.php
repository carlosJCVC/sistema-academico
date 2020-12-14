@extends('admin.layouts.app')

@section('htmlheader_title')
Justificaciones
@endsection


@section('content')

    <div class="card mt-3">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Justificaciones
            @can('create absences')
            <a class="btn btn-secondary" href="{{ route('admin.absences.create') }}">
                <i class="icon-plus"></i>&nbsp;Nuevo
            </a>
            @endcan
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    <th class="text-center">Usuario</th>
                    <th class="text-center">Fecha (ausencia)</th>
                    <th class="text-center">Hora (ausencia)</th>
                    <th class="text-center">Motivo/Justificacion</th>
                    <th class="text-center">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($absences as $absence)
                    <tr class="text-center">
                        <td>{{ $absence->formatUser() }}</td>
                        <td>{{ $absence->formatDateAbsence() }}</td>
                        <td>{{ $absence->formatSchedule() }}</td>
                        <td>{{ $absence->reason }}</td>
                        <td>
                            @can('edit absences')
                            <a class="btn btn-warning btn-sm" href="{{ route('admin.absences.edit', [ 'id' => $absence->id]) }}">
                                <i class="icon-pencil"></i>
                            </a>
                            @endcan
                            &nbsp;
                            @can('delete absences')
                            <form action="{{ route('admin.absences.destroy', [ 'id' => $absence->id]) }}"
                                  style="display:inline-block;"
                                  method="POST">

                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="button" class="btn btn-danger btn-sm"
                                        onclick="delete_action(event);">
                                    <i class="icon-trash penone"></i>
                                </button>
                            </form>
                            @endcan
                        </td>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection

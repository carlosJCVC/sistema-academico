@extends('admin.layouts.app')

@section('htmlheader_title')
    Grupo de Materia
@endsection


@section('content')

    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i>Grupo
            <a class="btn btn-secondary" href="{{ route('admin.asignature-group.create') }}">
                <i class="icon-plus"></i>&nbsp;Nuevo
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    <th># Grupo</th>
                    <th>Materia</th>
                    <th>Horarios</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($groups as $group)
                    <tr>
                        <td class="text-center">{{ $group->group }}</td>
                        <td class="text-center">{{ $group->asignature->name }}</td>
                        <td>
                            <ul class="list-group">
                                @foreach($group->teachers as $teacher)
                                    <li class="list-group-item" style="padding: 0 5px;border:none;background: transparent;">
                                        <div class="row">
                                            <div class="col-md-3">{{ $teacher->teacherIsTitular() }}</div>
                                            <div class="col-md-3">
                                                <span class="text-muted">De:</span>&nbsp;{{ $teacher->getStartSchedule()}}
                                            </div>
                                            <div class="col-md-3">
                                                <span class="text-muted">Hasta:</span>&nbsp;{{ $teacher->getEndsSchedule()}}
                                            </div>
                                            <div class="col-md-3">
                                                <span class="text-muted">Dia:</span>&nbsp;{{ $teacher->getDaySchedule()}}
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="{{ route('admin.asignature-group.edit', [ 'group' => $group->id]) }}">
                                <i class="icon-pencil"></i>
                            </a> &nbsp;
                            <form action="{{ route('admin.asignature-group.destroy', [ 'group' => $group->id]) }}"
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

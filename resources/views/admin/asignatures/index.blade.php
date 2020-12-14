@extends('admin.layouts.app')

@section('htmlheader_title')
    Materias
@endsection


@section('content')

    <div class="card mt-3">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Materias
            @can('create asignatures')
            <a class="btn btn-secondary" href="{{ route('admin.asignatures.create') }}">
                <i class="icon-plus"></i>&nbsp;Nuevo
            </a>
            @endcan
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Gestion</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($asignatures as $asignature)
                    <tr>
                        <td>{{ $asignature->name }}</td>
                        <td>{{ $asignature->gestion }}</td>
                        <td>
                            @can('edit asignatures')
                            <a class="btn btn-warning btn-sm" href="{{ route('admin.asignatures.edit', [ 'asignature' => $asignature->id]) }}">
                                <i class="icon-pencil"></i>
                            </a>
                            @endcan
                            &nbsp;
                            @can('delete asignatures')
                            <form action="{{ route('admin.asignatures.destroy', [ 'asignature' => $asignature->id]) }}"
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

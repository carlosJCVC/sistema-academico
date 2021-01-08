@extends('admin.layouts.app')

@section('htmlheader_title')
    Carreras
@endsection


@section('content')

    <div class="card mt-3">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Carreras
            <a class="btn btn-secondary" href="{{ route('admin.areas.create', [ 'academic' => $academic->id ]) }}">
                @can('create areas')
                <i class="icon-plus"></i>&nbsp;Nuevo
                @endcan
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($areas as $area)
                    <tr>
                        <td>{{ $area->name }}</td>
                        <td>

                            @can('list authorities')
                            <a class="btn btn-primary btn-sm" title="Autoridad" href="{{ route('admin.authorities.index', [ 'area' => $area->id ]) }}">
                                <i class="icon-list"></i>
                            </a>
                            @endcan
                            &nbsp;
                            @can('edit areas')
                            <a class="btn btn-warning btn-sm" href="{{ route('admin.areas.edit', [ 'area' => $area->id, 'academic' => $academic->id]) }}">
                                <i class="icon-pencil"></i>
                            </a>
                            @endcan
                            &nbsp;
                            @can('delete areas')
                            <form action="{{ route('admin.areas.destroy', [ 'area' => $area->id, 'academic' => $academic->id]) }}"
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

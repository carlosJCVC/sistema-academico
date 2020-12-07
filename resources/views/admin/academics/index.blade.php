@extends('admin.layouts.app')

@section('htmlheader_title')
    UNidades academicas
@endsection


@section('content')

    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Unidades Academicas
            @can('create academics')
            <a class="btn btn-secondary" href="{{ route('admin.academics.create') }}">
                <i class="icon-plus"></i>&nbsp;Nuevo
            </a>
            @endcan
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    <th >Nombre</th>
                    <th >Estado</th>
                    <th class="text-center">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($academics as $academic)
                    <tr>
                        <td>{{ $academic->name }}</td>
                        <td>
                            @if ($academic->status)
                                <span class="badge badge-success">HABILITADO</span>
                            @else
                                <span class="badge badge-danger">INHABILITADO</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @can('create academics')
                            <a class="btn btn-warning btn-sm" title="Áreas" href="{{ route('admin.areas.index', $academic->id) }}">
                                <i class="icon-list"></i>
                            </a> &nbsp;
                            @endcan
                            @can('edit academics')
                            <a class="btn btn-warning btn-sm" href="{{ route('admin.academics.edit', $academic->id) }}">
                                <i class="icon-pencil"></i>
                            </a> &nbsp;
                            @endcan
                            @can('delete academics')
                            <form action="{{ route('admin.academics.destroy', $academic->id) }}"
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

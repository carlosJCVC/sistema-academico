@extends('admin.layouts.app')

@section('htmlheader_title')
    Areas
@endsection


@section('content')

    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Areas
            <a class="btn btn-secondary" href="{{ route('admin.areas.create', [ 'academic' => $academic->id ]) }}">
                <i class="icon-plus"></i>&nbsp;Nuevo
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

                            <a class="btn btn-primary btn-sm" title="Subáreas" href="{{ route('admin.authorities.index', [ 'area' => $area->id ]) }}">
                                <i class="icon-list"></i>
                            </a> &nbsp;
                            <a class="btn btn-warning btn-sm" href="{{ route('admin.areas.edit', [ 'area' => $area->id, 'academic' => $academic->id]) }}">
                                <i class="icon-pencil"></i>
                            </a> &nbsp;
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

                        </td>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

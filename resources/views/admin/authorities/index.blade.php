@extends('admin.layouts.app')

@section('htmlheader_title')
    Autoridades
@endsection

@section('content')

    <div class="card mt-3">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Autoridades
            @can('create authorities')
            <a class="btn btn-secondary" href="{{ route('admin.authorities.create', [ 'area' => $area->id ]) }}">
                <i class="icon-plus"></i>&nbsp;Nuevo
            </a>
            @endcan
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    <th class="w-50">Nombre</th>
                    <th class="w-25">Cargo</th>
                    <th class="text-center">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($authorities as $item)
                    <tr>
                        <td>{{ $item->formatAuthority() }}</td>
                        <td>{{ $item->formatCargo() }}</td>
                        <td class="text-center">
                            @can('edit authorities')
                            <a class="btn btn-warning btn-sm" href="{{ route('admin.authorities.edit', [ 'area' => $area, 'authority' => $item->id]) }}">
                                <i class="icon-pencil"></i>
                            </a>
                            @endcan
                            &nbsp;
                            @can('delete authorities')
                            <form action="{{ route('admin.authorities.destroy', [ 'area' => $area, 'authority' => $item->id ]) }}"
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

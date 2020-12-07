@extends('admin.layouts.app')

@section('htmlheader_title')
    Subáreas
@endsection


@section('content')

    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Subáreas
            <a class="btn btn-secondary" href="{{ route('admin.subareas.create', [ 'area' => $area->id ]) }}">
                <i class="icon-plus"></i>&nbsp;Nuevo
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    <th class="w-50">Nombre</th>
                    <th class="text-center">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subareas as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td class="text-center">

                            <a class="btn btn-warning btn-sm" href="{{ route('admin.subareas.edit', [ 'area' => $area, 'subarea' => $item->id]) }}">
                                <i class="icon-pencil"></i>
                            </a> &nbsp;
                            <form action="{{ route('admin.subareas.destroy', [ 'area' => $area, 'subarea' => $item->id ]) }}"
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

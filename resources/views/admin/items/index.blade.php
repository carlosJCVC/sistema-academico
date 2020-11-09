@extends('admin.layouts.app')

@section('htmlheader_title')
    Items
@endsection


@section('content')

    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Items
            @can('create items')
            <a class="btn btn-secondary" href="{{ route('admin.items.create') }}">
                <i class="icon-plus"></i>&nbsp;Nuevo
            </a>
            @endcan
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    <th >Nombre</th>
                    <th >Código</th>
                    <th >Nivel</th>
                    <th >Docente</th>
                    @can('create items')
                    <th class="text-center">Opciones</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->level }}</td>
                        <td>{{ $item->teacher }}</td>
                        <td class="text-center">
                            @can('edit items')
                            <a class="btn btn-warning btn-sm" href="{{ route('admin.items.edit', $item->id) }}">
                                <i class="icon-pencil"></i>
                            </a> &nbsp;
                            @endcan
                            @can('delete items')
                            <form action="{{ route('admin.items.destroy', $item->id) }}"
                                  style="display:inline-block;"
                                  method="POST">

                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="button" class="btn btn-danger btn-sm"
                                        onclick="delete_action(event);">
                                    <i class="icon-trash"></i>
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

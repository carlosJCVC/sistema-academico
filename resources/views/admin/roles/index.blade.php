@extends('admin.layouts.app')

@section('htmlheader_title')
    Roles
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Usuarios
            <a class="btn btn-secondary" href="{{ route('admin.roles.create') }}">
                <i class="icon-plus"></i>&nbsp;Nuevo
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Permisos</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>
                            @foreach($role->permissions as $item)
                                <span class="badge badge-info">{{ $item->name  }}</span>
                            @endforeach
                        </td>
                        <td>

                            <a class="btn btn-warning btn-sm" href="{{ route('admin.roles.edit', $role->id) }}">
                                <i class="icon-pencil"></i>
                            </a> &nbsp;
                            <form action="{{ route('admin.roles.destroy', $role->id) }}"
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

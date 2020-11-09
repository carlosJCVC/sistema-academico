@extends('admin.layouts.app')

@section('htmlheader_title')
   Users
@endsection



@section('content')
    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Usuarios
            <a class="btn btn-secondary" href="{{ route('admin.users.create') }}">
                <i class="icon-plus"></i>&nbsp;Nuevo
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach($user->roles as $item)
                                <span class="badge badge-info">{{ $item->name  }}</span>
                            @endforeach
                        </td>
                        <td>

                            <a class="btn btn-warning btn-sm" href="{{ route('admin.users.edit', $user->id) }}">
                                <i class="icon-pencil"></i>
                            </a> &nbsp;
                            <form action="{{ route('admin.users.destroy', $user->id) }}"
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

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection

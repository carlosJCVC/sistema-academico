@extends('admin.layouts.app')

@section('htmlheader_title')
   Requirements
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Requisitos
            <a class="btn btn-secondary" href="{{ route('admin.requirements.create', $announcement->id) }}">
                <i class="icon-plus"></i>&nbsp;Nuevo
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Fecha creada</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse($requirements as $requirement)
                    <tr>
                        <td>{{ $requirement->title }}</td>
                        <td>{{ $requirement->created_at }}</td>
                        <td>

                            <a class="btn btn-warning btn-sm" href="{{ route('admin.requirements.edit', [ 'announcement' => $announcement->id, 'requirement' => $requirement->id ]) }}">
                                <i class="icon-pencil"></i>
                            </a> &nbsp;
                            <form action="{{ route('admin.requirements.destroy', [ 'announcement' => $announcement->id, 'requirement' => $requirement->id ]) }}"
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
                    </tr>
                @empty
                    <td></td>
                    <td class="text-center">Vacio</td>
                    <td></td>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection

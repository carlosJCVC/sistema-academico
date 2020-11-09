@extends('admin.layouts.app')

@section('htmlheader_title')
    Avisos
@endsection


@section('content')

    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Avisos
            @can('create avisos')
            <a class="btn btn-secondary" href="{{ route('admin.avisos.create') }}">
                <i class="icon-plus"></i>&nbsp;Nuevo
            </a>
            @endcan
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    <th>Titulo</th>
                    @can('create avisos')
                    <th>Opciones</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach($avisos as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>
                            @can('create avisos')
                            <a class="btn btn-warning btn-sm" href="{{ route('admin.avisos.edit', [ 'aviso' => $item->id ]) }}">
                                <i class="icon-pencil"></i>
                            </a> &nbsp;
                            @endcan
                            @can('delete avisos')
                            <form action="{{ route('admin.avisos.destroy', [ 'aviso' => $item->id ]) }}"
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

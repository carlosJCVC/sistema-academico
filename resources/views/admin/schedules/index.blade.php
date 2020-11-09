@extends('admin.layouts.app')

@section('htmlheader_title')
    Horarios
@endsection


@section('content')

    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Horarios
            <a class="btn btn-secondary" href="{{ route('admin.schedules.create') }}">
                <i class="icon-plus"></i>&nbsp;Nuevo
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    <th>De</th>
                    <th>A</th>
                    <th>Dia</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($schedules as $item)
                    <tr>
                        <td>{{ $item->from }}</td>
                        <td>{{ $item->to }}</td>
                        <td>{{ $item->day }}</td>
                        <td>

                            <a class="btn btn-warning btn-sm" href="{{ route('admin.schedules.edit', [ 'schedule' => $item->id ]) }}">
                                <i class="icon-pencil"></i>
                            </a> &nbsp;
                            <form action="{{ route('admin.schedules.destroy', [ 'schedule' => $item->id ]) }}"
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

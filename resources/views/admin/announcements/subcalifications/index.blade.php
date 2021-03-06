@extends('admin.layouts.app')

@section('htmlheader_title')
   Sub califications
@endsection


@section('content')

    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Sub Calificaciones
            @can('create announcements')
            <a class="btn btn-secondary" href="{{ route('admin.subcalifications.create', ['calification' => $calification]) }}">
                <i class="icon-plus"></i>&nbsp;Nuevo
            </a>
            @endcan
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Porcentaje</th>
                    <th>Descripción</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subcalifications as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->percentage*100 }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            @can('edit announcements')
                            <a class="btn btn-warning btn-sm" href="{{ route('admin.subcalifications.edit', [ 'calification' => $calification->id, 'subcalification' => $item->id]) }}">
                                <i class="icon-pencil"></i>
                            </a>
                            @endcan
                                @can('delete announcements')
                               <form action="{{ route('admin.subcalifications.destroy', [ 'calification' => $calification->id, 'subcalification' => $item->id]) }}"
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

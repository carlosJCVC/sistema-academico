@extends('admin.layouts.app')

@section('htmlheader_title')
Bitacoras
@endsection

@section('content')

    <div class="card mt-3">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Bitacora de acciones
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    <th class="text-center">Usuario</th>
                    <th class="text-center">Rol</th>
                    <th class="text-center">Evento/Accion</th>
                    <th class="text-center">Recurso</th>
                    <th class="text-center">Recurso Id</th>
                    <th class="text-center">Fecha</th>
                    <th class="text-center">Hora</th>
                    <th class="text-center">Direccion IP</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bitacoras as $bitacora)
                    <tr class="text-center">
                        <td>{{ $bitacora->formatUser() }}</td>
                        <td>{{ $bitacora->getRoleUserFiredEvent() }}</td>
                        <td>{!! $bitacora->formatEvent() !!}</td>
                        <td>{{ $bitacora->formatModelAudit() }}</td>
                        <td>{{ $bitacora->auditable_id }}</td>
                        <td>{{ $bitacora->formatDate() }}</td>
                        <td>{{ $bitacora->formatTime() }}</td>
                        <td>{{ $bitacora->ip_address }}</td>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection

@extends('admin.layouts.app')

@section('htmlheader_title')
Sessiones
@endsection

@section('content')

    <div class="card mt-3">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Historial de sesiones
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    <th class="text-center">Usuario</th>
                    <th class="text-center">Rol</th>
                    <th class="text-center">Evento/Accion</th>
                    <th class="text-center">Fecha</th>
                    <th class="text-center">Hora</th>
                    <th class="text-center">Direccion IP</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sessions as $session)
                    <tr class="text-center">
                        <td>{{ $session->formatUser() }}</td>
                        <td>{{ $session->getRoleUserFiredEvent() }}</td>
                        <td>{!! $session->formatEvent() !!}</td>
                        <td>{{ $session->formatDate() }}</td>
                        <td>{{ $session->formatTime() }}</td>
                        <td>{{ $session->ip_address }}</td>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection

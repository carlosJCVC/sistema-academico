@extends('admin.layouts.app')

@section('htmlheader_title')
   Postulants
@endsection

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables/DataTables/datatables.min.css') }}"/>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Postulantes
            {{--
            @can('create postulants')
                <a class="btn btn-secondary" href="{{ route('admin.users.create') }}">
                    <i class="icon-plus"></i>&nbsp;Nuevo
                </a>
            @endcan
            --}}
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="status">Estado</label>
                <select class="form-control input-sm" id="status">
                  <option value="-1">TODOS</option>
                  <option value="HABILITADO">HABILITADO</option>
                  <option value="INHABILITADO">INHABILITADO</option>
                </select>
            </div>

            <table id="example" class="table table-bordered table-striped table-sm" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Calf. Meritos</th>
                    <th>Calf. Conocimiento</th>
                    <th>Nota Total</th>
                    <th>Observaciones</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                {{--
                <tbody>
                @foreach($postulants as $postulant)
                    <tr>
                        <td>{{ $postulant->name }}</td>
                        <td>{{ $postulant->lastname }}</td>
                        <td>{{ $postulant->phone }}</td>
                        <td>{{ $postulant->email }}</td>
                        <td>

                            <a class="btn btn-success btn-sm" href="{{ route('admin.postulants.show', ['announcement' => $announcement->id, 'postulant' => $postulant->id]) }}">
                                <i class="icon-eye"></i>
                            </a>

                            <a class="btn btn-warning btn-sm" href="{{ route('admin.postulants.show', ['announcement' => $announcement->id, 'postulant' =>$postulant->id]) }}">
                                <i class="icon-pencil"></i>Revisar
                            </a>

                            <form action="{{ route('admin.postulants.destroy', ['announcement' =>$announcement->id, 'postulant' =>$postulant->id]) }}"
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
                --}}
            </table>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('assets/js/jquery-3.3.1.min.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('assets/datatables/DataTables/datatables.min.js') }}" defer></script>

    <script>
        $(document).ready(function() {

            var table = $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                orderCellsTop: true,
                fixedHeader: true,
                "ajax": {
                    "url": '{{ route('admin.postulants.index', $announcement->id) }}',
                    "data": {
                        filter: function () { return $('#status').val() }
                    }
                },
                "columns": [
                        { data: 'name', name: 'name' },
                        { data: 'lastname', name: 'lastname' },
                        { data: 'phone', name: 'phone' },
                        { data: 'email', name: 'email' },
                        { data: 'status', name: 'status', searchable: true },
                        { data: 'meritos', name: 'meritos', className: "text-center" },
                        { data: 'conocimientos', name: 'conocimientos', className: "text-center" },
                        { data: 'total', name: 'total', className: "text-center" },
                        { data: 'observations', name: 'observations' },
                        { data: 'actions', name: 'actions' },
                ]
            });

            $('#status').change(function(e) {
                e.preventDefault();
                table.ajax.reload()
            })

        });
    </script>
@endsection
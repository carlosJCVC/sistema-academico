@extends('admin.layouts.app')

@section('htmlheader_title')
Copias Seguridad
@endsection

@section('styles')
    <link href="{{ asset('assets/css/font-awesome-4.6.1/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/util.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/ladda/dist/ladda-themeless.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/pnotify/dist/pnotify.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')

    <div class="card mt-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <i class="fa fa-wrench"></i> {{ $data['title'] or 'Backups de la base de datos' }}
                </div>
                <div class="col-md-6 text-right">
                    @can('create backups')
                    <button id="create-new-backup-button" 
                        href="{{ url('admin/backup/create') }}"
                        class="ladda-button" data-style="zoom-in">
                        <span class="ladda-label text-muted"><i class="icon-plus"></i> Crear nuevo backup</span>
                    </button>
                    @endcan
                    <a class="ladda-button btn" href="{{ route('admin.backup.restart') }}">
                        <i class="icon-magic-wand"></i>&nbsp;restaurar
                    </a>
                </div>
            </div>
            
        </div>
        <div class="card-body">
            @if (count($backups))
                <table class="table table-striped table-bordered table-sm">
                    <thead class="thead-dark">
                        <tr class="">
                            <th class="text-center">#</th>
                            <th class="text-center">Archivo</th>
                            <th class="text-center">Tama&ntilde;o</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">&nbsp;</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($backups as $index => $backup)
                            <tr class="text-center">
                                <th scope="row">{{ $index+1 }}</th>
                                <td>{{ $backup['file_name'] }}</td>
                                <td>
                                    {{ round((int)$backup['file_size']/1048576, 2).' MB' }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::createFromTimeStamp($backup['last_modified'])->formatLocalized('%d / %m / %Y, %H:%M') }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::createFromTimeStamp($backup['last_modified'])->diffForHumans() }}
                                </td>
                                <td>
                                    @can('download backups')
                                    @if ($backup['download'])
                                    <a class="btn btn-primary"
                                        {{-- href="{{ url('admin/backup/download/'.$backup['file_name']) }}"> --}}
                                        href="{{ url('/admin/backup/download/') }}?disk={{ $backup['disk'] }}&path={{ urlencode($backup['file_path']) }}&file_name={{ urlencode($backup['file_name']) }}">
                                        <i class="icon-cloud-download penone"></i>
                                    </a>
                                    @endif
                                    @endcan
                                    @can('delete backups')
                                    {{-- <a class="btn btn-xs btn-danger" data-button-type="delete" href="{{ url('/admin/backup/delete/'.$backup['file_name']) }}"> --}}
                                    <a class="btn btn-xs btn-danger" data-button-type="delete" href="{{ url('/admin/backup/delete/'.$backup['file_name']) }}?disk={{ $backup['disk'] }}">
                                        <i class="icon-trash penone"></i>
                                    </a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center py-5">
                    <h1 class="text-muted">No existen backups</h1>
                </div>
            @endif
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <a class="btn btn-secondary" href="{{ route('admin.dashboard') }}">
                <i class="icon-arrow-left"></i>&nbsp;Volver
            </a>
                </div>    
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
    <!-- Ladda Buttons (loading buttons) -->
    <script src="{{ asset('assets/ladda/dist/spin.js') }}"></script>
    <script src="{{ asset('assets/ladda/dist/ladda.js') }}"></script>
    <script src="{{ asset('assets/pnotify/dist/pnotify.js') }}"></script>
    <script>
        PNotify.prototype.options.styling = "bootstrap3";
        $(document).ready(function() {

            // capture the Create new backup button
            $("#create-new-backup-button").click(function(e) {
                e.preventDefault();
                var create_backup_url = $(this).attr('href');
                // Create a new instance of ladda for the specified button
                var l = Ladda.create( document.querySelector( '#create-new-backup-button' ) );

                // Start loading
                l.start();

                // Will display a progress bar for 10% of the button width
                l.setProgress( 0.3 );

                setTimeout(function(){ l.setProgress( 0.6 ); }, 2000);

                // do the backup through ajax
                // https://stackoverflow.com/questions/21627170/laravel-tokenmismatchexception-in-ajax-request
                $.ajax({
                        url: create_backup_url,
                        type: 'PUT',
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(result) {
                            console.log(result);
                            console.log(result);
                            l.setProgress( 0.9 );
                            // Show an alert with the result
                            if (result.indexOf('failed') >= 0) {
                                new PNotify({
                                    title: "Estamos presentando problemas",
                                    text: "La copia de seguridad puede que no se haya realizado. Por favor verifica los logs para más detalles.",
                                    type: "warning"
                                });
                            }
                            else
                            {
                                new PNotify({
                                    title: "Se ha completado la copia de seguridad",
                                    text: "Recargando la página en 3 segundos.",
                                    type: "success"
                                });
                            }

                            // Stop loading
                            l.setProgress( 1 );
                            l.stop();

                            // refresh the page to show the new file
                            setTimeout(function(){ location.reload(); }, 3000);
                        },
                        error: function(result) {
                            l.setProgress( 0.9 );
                            // Show an alert with the result
                            new PNotify({
                                title: "Error al realizar la copia de seguridad",
                                text: "La copia de seguridad NO se pudo crear.",
                                type: "warning"
                            });
                            // Stop loading
                            l.stop();
                        }
                    });
            });

            // capture the delete button
            $("[data-button-type=delete]").click(function(e) {
                e.preventDefault();
                var delete_button = $(this);
                var delete_url = $(this).attr('href');

                if (confirm("¿Estás seguro que quieres borrar esta copia de seguridad?") == true) {
                    $.ajax({
                        url: delete_url,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(result) {
                            // Show an alert with the result
                            new PNotify({
                                title: "Confirmado",
                                text: "La copia de seguridad fue eliminada.",
                                type: "success"
                            });
                            // delete the row from the table
                            delete_button.parentsUntil('tr').parent().remove();
                        },
                        error: function(result) {
                            // Show an alert with the result
                            new PNotify({
                                title: "Ups, ha ocurrido un error",
                                text: "La copia de seguridad NO se pudo eliminar.",
                                type: "warning"
                            });
                        }
                    });
                } else {
                    new PNotify({
                        title: "La operación ha sido cancelada",
                        text: "La copia de seguridad NO se pudo eliminar.",
                        type: "info"
                    });
                }
            });

        });
    </script>
@endsection
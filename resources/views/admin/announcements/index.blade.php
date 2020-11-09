@extends('admin.layouts.app')

@section('htmlheader_title')
   Announcements
@endsection


@section('content')

    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Convocatorias
            @can('create announcements')
            <a class="btn btn-secondary" href="{{ route('admin.announcements.create') }}">
                <i class="icon-plus"></i>&nbsp;Nuevo
            </a>
            @endcan
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Fecha calificacion</th>
                    <th>Fecha calificacion fin</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($announcements as $announcement)
                    <tr>
                        <td>{{ $announcement->title }}</td>
                        <td>{{ $announcement->start_date_announcement }}</td>
                        <td>{{ $announcement->end_date_announcement }}</td>
                        <td>{{ $announcement->start_date_calification }}</td>
                        <td>{{ $announcement->end_date_calification }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.announcements.show', $announcement->id) }}">
                                <i class="icon-eye"></i>
                            </a>
                            @can('edit announcements')
                            <a class="btn btn-warning btn-sm" href="{{ route('admin.announcements.edit', $announcement->id) }}">
                                <i class="icon-pencil"></i>
                            </a>
                            @endcan
                                @can('list requirements')
                                <a class="btn btn-success" href="{{ route('admin.data.index', $announcement->id) }}">
                                    <i class="fa fa-tasks"></i>
                                </a>
                                @endcan

                                {{-- @if(Auth::user()->hasRole(['Comisión conocimiento', 'Comisión méritos'])) --}}
                                <a class="btn btn-info" href="{{ route('admin.postulants.index', $announcement->id) }}">
                                    <i class="fa fa-users"></i>
                                </a>
                                {{-- @endif --}}
                                {{--
                                    @if(Auth::user()->hasRole(['Admin', 'Postulante']))
                                    <a class="btn btn-outline-primary" href="{{ route('admin.requirements.files', $announcement->id) }}">
                                        <i class="fa fa-upload"></i> subir
                                    </a>
                                    @endif
                                --}}
                                {{--
                                @if(Auth::user()->hasRole(['Comisión conocimiento', 'Comisión méritos']))
                                    <a class="btn btn-outline-primary" href="{{ route('admin.postulants.index', $announcement->id) }}">
                                        <i class="fa fa-user"></i> Postulantes
                                    </a>
                                @endif
                                --}}

                                @can('list publishes')
                                    <a class="btn btn-secondary" href="{{ route('admin.announcements.publish', [ 'announcement' => $announcement->id ]) }}">
                                        <i class="fa fa-lock"></i>
                                    </a>
                                @endcan

                                @can('delete announcements')
                               <form action="{{ route('admin.announcements.destroy', $announcement->id) }}"
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

@section('scripts')
    <script>
        const show_code = (code) => {
            swalWithBootstrapButtons.fire({
                title: 'Que quieres realizar ?',
                text: "Cambiar el codigo no es recomendable!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Ver Codigo!',
                cancelButtonText: 'Cambiar, Codigo!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    showCode()
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    changePassword()
                }
            })

        }

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-outline-success',
                cancelButton: 'btn btn-outline-danger'
            },
            buttonsStyling: false
        })

        const showCode = () => {
            return fetch(`{{ route('admin.announcements.show', [ 'id' => 1 ] ) }}`, {
                method: 'GET',
                //body: new URLSearchParams({code: text}),
                headers: new Headers({
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }),
            }).then(async response => {
                if (!response.ok) {
                    throw new Error(response.statusText)
                }

                let res = await response.json()

                swalWithBootstrapButtons.fire(
                    `Codigo => ${ res.code }`,
                    'Codigo para realizar postulacion.',
                    'success'
                )
            })
        }



        const changePassword = () => {
            Swal.fire({
                title: 'Cambiar codigo',
                html: `<h2 style='font-family: cursive'><strong>Ingrese el nuevo codigo</strong></2>.`,
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Cambiar',
                showLoaderOnConfirm: true,
                preConfirm: (text) => {
                    let url = ``;
                    return fetch(url, {
                        method: 'PUT',
                        body: new URLSearchParams({code: text}),
                        headers: new Headers({
                            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }),
                    }).then(response => {
                        if (!response.ok) {
                            throw new Error(response.statusText)
                        }
                        return response.json()
                    }).catch(error => {
                        if (error.message == 'Bad Request') {
                            Swal.showValidationMessage(
                                `El campo de texto no puede estar vacio.`
                            )
                        } else {
                            Swal.showValidationMessage(
                                `Request failed: ${error}`
                            )
                        }
                    });
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: `Codigo cambiado con exito`,
                        imageUrl: 'https://fotos01.diarioinformacion.com/mmp/2018/11/18/690x278/inteligenciartificial.jpg'
                    })
                }
            })
        }

    </script>
@endsection
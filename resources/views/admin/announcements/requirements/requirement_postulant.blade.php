@extends('admin.layouts.app')

@section('htmlheader_title')
    Requirements
@endsection

@section('content')
@php
    $reqs = $announcement->requiredRequirements();
    $requirements_required = true;
    foreach ($reqs as $value) {
        if ($value->requirementFile() == null) {
            $requirements_required = false; 
        }
    }
@endphp
    <div class="card" style="height: 100vh">
        <div class="card-header text-center title-panel">PANEL DE CONTROL</div>
        <div class="card-body" style="background-image: url('{{ asset('images/adinfondo.jpg') }}'); background-size: cover; background-repeat: no-repeat">
            <div class="row">
                <div class="col-3">
                    <div class="card border-info shadow_card special-card">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">REQUISITOS INDISPENSABLES</a>
                            @if ($requirements_required)
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">REQUISITOS GENERALES</a>
                            @endif
                            @if ($requirements_required)
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">CONSULTAS</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                @include('admin.announcements.requirements.partials.list', [ 'announcement' => $announcement,'items' => $announcement->requiredRequirements() ])
                            </div>                            
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                @include('admin.announcements.requirements.partials.list', [ 'announcement' => $announcement, 'items' => $announcement->generalRequirements() ])
                            </div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                CHAT
                            </div>
                        </div>
                    </div>
                    @if ($requirements_required)
                        <div class="text-center">
                            <a data-toggle="pill" href="#v-pills-messages" class="btn btn-success">Siguiente</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>




    <!-- Modal-->
    <div class="modal fade" id="requirement_file" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-transform: uppercase;">Subir archivo</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <form action="#" id="uploadFileRequirement" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <input type="file" name="file" class="form-control" multiple="false">
                            <div class="form-actions text-center mt-4">
                                <button type="button" class="btn btn-outline-primary mb-4" onclick="upload(event);">Subir</button>
                            </div>
                        </form>
                    </div>

                    <table id="table_file" class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Fecha enviada</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="title_file"></td>
                                <td id="created_date_file"></td>
                                <td>
                                    <a class="btn btn-danger btn-sm" id="delete_file">
                                        <i class="icon-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        let anouncement_modal = $("#requirement_file")
        let title_file = $("#title_file")
        let created_file = $("#created_date_file")
        var url_form ;

        const show_form = (file, url) => {
            url_form = url
            if (!file) {
                $('#table_file').hide();
                anouncement_modal.modal()
            } else {
                title_file.html(`<a target="_blank" href="{{ asset('assets/') }}/${file.path}">${file.realname}</a>`)
                created_file.html(file.created_at)
                $('#table_file').show();
                anouncement_modal.modal()
            }

        }

        const upload = (e) => {
            e.preventDefault();
            $('#uploadFileRequirement').attr('action', url_form).submit();
        }

        $('#delete_file').click(function(){
            $.ajax({
                method: "DELETE",
                url: "{{ route('admin.requirements.file_delete', [ 'announcement' => 1, 'requirement' => 1 ]) }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function() {
                location.reload(true);
                toastr.error('archivo eliminado')
            });
        })

        {{--
        fetch(`{{ route('admin.requirements.file', [ 'announcement' => 1, 'requirement' => 1 ] ) }}`, {
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
            console.log(res)
            if(res.code == 404) {
                alert()
            }
        })
        --}}
    </script>
@endsection
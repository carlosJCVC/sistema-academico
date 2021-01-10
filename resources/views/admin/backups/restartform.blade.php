@extends('admin.layouts.app')

@section('htmlheader_title')
Backup - Restaurar
@endsection

@section('content')

    <div class="card mt-3">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Restaurar Recurso - Base de datos
            <a class="btn btn-danger float-right" href="{{ route('admin.backup.backups') }}">
                <i class="icon-action-undo"></i>&nbsp;cancelar
            </a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-warning" role="alert">
                        El formato del archivo a subir debe ser <pre>.sql</pre>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card border-light">
                        <div class="card-body">
                            <form action="{{ route('admin.backup.restart.now') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="col-md-12 mb-3">
                                    <label class="col-form-label">Archivo (requerido): </label>
                                    <div class="input-group">
                                        <span class="input-group-append">
                                            <button class="btn btn-primary" type="button">FILE</button>
                                        </span>
                                        <label for="file" class="btn border" style="cursor: pointer;">
                                            <i class="fa fa-cloud-upload"></i>&nbsp;Seleccionar documento
                                        </label>
                                        <label id="filename" class="btn btn-block border">
                                            <strong class="text-capitalize">no hay archivo <code>.sql</code></strong>
                                        </label>
                                        <input 
                                            type="file"
                                            id="file"
                                            class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}"
                                            style="display: none"
                                            name="file">
                                    </div>

                                    <div class="invalid-feedback {{ $errors->has('file')? 'd-block' : '' }}">
                                        {{ $errors->has('file')? $errors->first('file') : 'El campo es requerido' }}
                                    </div>
                                </div>
                                {{-- <button class="btn btn-success btn-block text-uppercase"></button> --}}
                                <button type="button" class="btn btn-danger btn-block text-uppercase"
                                        onclick="restore_action(event);">
                                    <i class="icon-refresh penone"></i>restaurar base de datos
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script>
    $("#file").change(function(){
        $("#filename strong").text(this.files[0].name);
    });
</script>
@endsection


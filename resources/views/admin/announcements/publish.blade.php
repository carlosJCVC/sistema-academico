@extends('admin.layouts.app')

@section('htmlheader_title')
    Aviso
@endsection

@section('styles')
    <link href="{{ asset('assets/css/font-awesome-4.6.1/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/util.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('assets/dropify/css/dropify.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dropify/css/demo.css') }}">
@endsection

@section('content')

    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-edit"></i>Publicar notas</div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.resannoun.store', [ 'announcement' => $announcement->id ]) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-row">

                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label" for="title">Titulo</label>
                                    <div class="input-group">
                                        <span class="input-group-append">
                                            <button class="btn btn-primary" type="button">N</button>
                                        </span>
                                        <input
                                            class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                            name="title"
                                            placeholder="Ingrese titulo" type="text"  value="{{ old('title') }}">
                                    </div>
                            
                                    <div class="invalid-feedback {{ $errors->has('title')? 'd-block' : '' }}">
                                        {{ $errors->has('title')? $errors->first('title') : 'El campo de titulo es requerido'  }}
                                    </div>
                                </div>
                            
                                <div class="col-md-12 mb-3">
                                    <input type="file" class="dropify" name="file"  
                                        data-max-file-size="3M"
                                    />
                                
                                    <div class="invalid-feedback {{ $errors->has('file')? 'd-block' : '' }}">
                                        {{ $errors->has('file')? $errors->first('file') : 'El campo de file es requerido'  }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions text-center">
                                <button class="btn btn-outline-primary" type="submit">Guardar</button>
                                <a class="btn btn-outline-danger" href="{{ route('admin.announcements.index') }}">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- /.row-->
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('assets/dropify/js/dropify.js') }}"></script>

    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Arrastra y suelta un archivo aquí o haz clic',
                'replace': 'Arrastra y suelta o haz clic para reemplazar',
                'remove':  'Eliminar',
                'error':   'Vaya, algo malo sucedió.'
            }
        });
    </script>
@endsection
@extends('admin.layouts.app')

@section('htmlheader_title')
Bitacoras - Restaurar
@endsection

@section('content')

    <div class="card mt-3">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Restaurar Recurso
            <a class="btn btn-danger float-right" href="{{ route('admin.bitacoras.index') }}">
                <i class="icon-action-undo"></i>&nbsp;cancelar
            </a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="card border-light">
                        <div class="card-body">
                            <span class="text-muted">Recurso</span><h5 class="card-title">{{ $audit->formatModelAudit() }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Valores antiguos</h5>
                        <p class="card-text">
                            {{-- <code> --}}
                                <pre>{!! json_encode($audit->new_values, JSON_PRETTY_PRINT) !!}</pre>
                            {{-- </code> --}}
                        </p>
                    </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Valores actuales del recurso</h5>
                        <p class="card-text">
                            {{-- <code> --}}
                                <pre>{!! json_encode($current_model->makeHidden(['id','created_at', 'updated_at', 'deleted_at']), JSON_PRETTY_PRINT) !!}</pre>
                            {{-- </code> --}}
                        </p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <form action="{{ route('admin.bitacoras.transition', $audit->id) }}" method="POST">
                {{ csrf_field() }}
                <button class="btn btn-success btn-block text-uppercase">restaurar a valor antiguo</button>
            </form>
        </div>
    </div>
    
@endsection

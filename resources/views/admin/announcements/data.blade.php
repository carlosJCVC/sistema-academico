@extends('admin.layouts.app')

@section('htmlheader_title')
   Lista de datos
@endsection

@section('content')

<nav class="nav nav-pills flex-column flex-sm-row">
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Requeriminetos</a>
      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Requisitos</a>
      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Documentos</a>
      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-event" role="tab" aria-controls="nav-event" aria-selected="false">Eventos</a>
      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-calification" role="tab" aria-controls="nav-calification" aria-selected="false">Calificación méritos</a>
      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-calification-cono" role="tab" aria-controls="nav-calification-cono" aria-selected="false">Calificación conocimiento</a>
    </div>
</nav>

  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Requerimientos
                @can('create announcements')
                <a class="btn btn-secondary" href="{{ route('admin.requirements.create', [ 'announcement' => $announcement ]) }}">
                    <i class="icon-plus"></i>&nbsp;Nuevo
                </a>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Cantidad de auxiliares</th>
                        <th>Horas academicas</th>
                        <th>Destino</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($requirements as $requirement)
                        <tr>
                            <td>{{ $requirement->quantity }}</td>
                            <td>{{ $requirement->hours }}</td>
                            <td>{{ $requirement->destine }}</td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.requirements.edit', [ 'requirement' => $requirement->id, 'announcement' => $announcement->id ]) }}">
                                    <i class="icon-pencil"></i>
                                </a>
    
                                <form action="{{ route('admin.requirements.destroy', [ 'requirement' => $requirement->id, 'announcement' => $announcement->id ]) }}"
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
                </table>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Requisitos
                @can('create announcements')
                <a class="btn btn-secondary" href="{{ route('admin.conditions.create', [ 'announcement' => $announcement ]) }}">
                    <i class="icon-plus"></i>&nbsp;Nuevo
                </a>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($conditions as $item)
                        <tr>
                            <td>{{ $item->description }}</td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.conditions.edit', [ 'condition' => $item->id, 'announcement' => $announcement->id ]) }}">
                                    <i class="icon-pencil"></i>
                                </a>
    
                                <form action="{{ route('admin.conditions.destroy', [ 'condition' => $item->id, 'announcement' => $announcement->id ]) }}"
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
                </table>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Documentos
                @can('create announcements')
                <a class="btn btn-secondary" href="{{ route('admin.documents.create', [ 'announcement' => $announcement ]) }}">
                    <i class="icon-plus"></i>&nbsp;Nuevo
                </a>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($documents as $item)
                        <tr>
                            <td>{{ $item->description }}</td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.documents.edit', [ 'document' => $item->id, 'announcement' => $announcement->id ]) }}">
                                    <i class="icon-pencil"></i>
                                </a>
    
                                <form action="{{ route('admin.documents.destroy', [ 'document' => $item->id, 'announcement' => $announcement->id ]) }}"
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
                </table>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="nav-event" role="tabpanel" aria-labelledby="nav-event-tab">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Eventos
                @can('create announcements')
                <a class="btn btn-secondary" href="{{ route('admin.events.create', [ 'announcement' => $announcement ]) }}">
                    <i class="icon-plus"></i>&nbsp;Nuevo
                </a>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Fecha</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->date }}</td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.events.edit', [ 'event' => $item->id, 'announcement' => $announcement->id ]) }}">
                                    <i class="icon-pencil"></i>
                                </a>
    
                                <form action="{{ route('admin.events.destroy', [ 'event' => $item->id, 'announcement' => $announcement->id ]) }}"
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
                </table>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="nav-calification" role="tabpanel" aria-labelledby="nav-calification-tab">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Calificación méritos
                @can('create announcements')
                <a class="btn btn-secondary" href="{{ route('admin.califications.create', [ 'announcement' => $announcement ]) }}">
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
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($califications as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->percentage*100 }} %</td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{ route('admin.subcalifications.index', [ 'calification' => $item->id ]) }}">
                                    <i class="icon-list"></i>
                                </a>

                                <a class="btn btn-warning btn-sm" href="{{ route('admin.califications.edit', [ 'califications' => $item->id, 'announcement' => $announcement->id ]) }}">
                                    <i class="icon-pencil"></i>
                                </a>
    
                                <form action="{{ route('admin.califications.destroy', [ 'calification' => $item->id, 'announcement' => $announcement->id ]) }}"
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
                </table>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="nav-calification-cono" role="tabpanel" aria-labelledby="nav-calification-tab">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Calificación conocimientos
                @can('create announcements')
                <a class="btn btn-secondary" href="{{ route('admin.ratings.create', [ 'announcement' => $announcement ]) }}">
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
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ratings as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->percentage*100 }} %</td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{ route('admin.subratings.index', [ 'rating' => $item->id ]) }}">
                                    <i class="icon-list"></i>
                                </a>

                                <a class="btn btn-warning btn-sm" href="{{ route('admin.ratings.edit', [ 'rating' => $item->id, 'announcement' => $announcement->id ]) }}">
                                    <i class="icon-pencil"></i>
                                </a>
    
                                <form action="{{ route('admin.ratings.destroy', [ 'rating' => $item->id, 'announcement' => $announcement->id ]) }}"
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
                </table>
            </div>
        </div>
    </div>
  </div>

@endsection

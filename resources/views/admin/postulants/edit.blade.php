@extends('admin.layouts.app')

@section('htmlheader_title')
    Postulant
@endsection

@section('styles')
    <link href="{{ asset('assets/css/font-awesome-4.6.1/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/util.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}" />
@endsection

@section('content')

    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-edit"></i>Habilitar/Inhabilitar postulante</div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.postulants.update', [ 'announcement' => $announcement->id, 'postulant' => $postulant ]) }}" method="POST">
                            {{ method_field('PUT')}}
                            {{ csrf_field() }}

                            @include('admin.postulants.form')

                            <div class="form-actions text-center">
                                @if ($postulant->status == 'HABILITADO' )
                                    <button class="btn btn-outline-danger" type="submit">INHABILITAR</button>    
                                @else
                                    <button class="btn btn-outline-primary" type="submit">HABILITAR</button>    
                                @endif
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
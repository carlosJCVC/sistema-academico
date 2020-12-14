@extends('admin.layouts.app')

@section('htmlheader_title')
    Asistencia y Avance
@endsection

@section('styles')
    <link href="{{ asset('assets/css/font-awesome-4.6.1/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/util.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css" />

    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <style>
    .select2.select2-container.select2-container--default {
        width: 100% !important;
    }
    .select2-selection {
        height: 100% !important;
    }
    </style>
@endsection

@section('content')

    <div class="animated fadeIn">
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-edit"></i>Editar Informe Asistencia y Avance</div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.asistencia-avance.update', [ 'id' => $report->id]) }}" method="POST" enctype="multipart/form-data">
                            {{ method_field('PUT')}}
                            {{ csrf_field() }}

                            @include('admin.reports.asistencia_avance.form')

                            <div class="form-actions text-center">
                                @can('edit week reports')
                                <button class="btn btn-outline-primary" type="submit">Actualizar</button>
                                @endcan
                                <a class="btn btn-outline-danger" href="{{ route('admin.asistencia-avance.index') }}">Cancelar</a>
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
    <script>
        // https://stackoverflow.com/questions/16480910/update-select2-data-without-rebuilding-the-control
        window.__ = {};
        window.__.clearOptions = _ => {
            window.__.asignature.select2().empty();
            window.__.group.select2().empty();
        }
        window.__.clearValues = _ => {
            window.__.asignature.val(null).trigger("change");
            window.__.group.val(null).trigger("change");
            $('#cod_sis').val(null);
            // $('#from').val(null);
            // $('#to').val(null);
        }

        window.__.setCodSisValue = ({cod_sis}) => {
            $('#cod_sis').val(cod_sis);
        }
        window.__.setAsignature = (asignatures) => {
            const data = asignatures.map(({id, name: text}) => Object.assign({}, {id, text}));
            __.asignature.select2().empty();
            __.asignature.select2({data});
            __.asignature.val(null).trigger('change');
            @if(old('asignature'))
                __.asignature.val({{ old('asignature') }}).trigger('change');
            @endif

            @if(isset($report))
                // on edit view
                __.asignature.val({{ $report->asignature }}).trigger('change');
            @endif

        }
        window.__.setGroup = asignature_id => {
            const {groups} = __.data;
            const data = groups
                .filter(group => group.asignature_id === asignature_id)
                .map(group => Object.assign({}, {id:group.id}, {text:`grupo ${group.group}`}));
            __.group.select2().empty();
            __.group.select2({data});
            __.group.val(null).trigger('change');
            @if(old('group'))
                __.group.val({{ old('group') }}).trigger('change');
            @endif

            @if(isset($report))
                // on edit view
                __.group.val({{ $report->group }}).trigger('change');
            @endif
        }
        // window.__.setSchedule = group_id => {
        //     const {schedules} = __.data;
        //     const schedule = schedules.find(schedule => schedule.group_id === group_id);
        //     $('#from').val(schedule.from);
        //     $('#to').val(schedule.to);
        // }

        const select2_template = {
            placeholder: "Seleccione un valor",
            allowClear: true,
        };

        window.__.user = $('#user').select2(select2_template);
        window.__.asignature = $('#asignature').select2(select2_template);
        window.__.group = $('#group').select2(select2_template);


        __.user.on("select2:select", function (e) {
            console.log('trigger event');
            __.clearOptions();
            $.ajax({
                url: "{{ route('admin.asistencia-avance.precreate') }}",
                data: { user: Number(e.target.value) }
            })
            .done(function( data, textStatus, jqXHR ) {
                window.__.data = data;
                const {self, asignatures} = __.data;
                __.setCodSisValue(self);
                __.setAsignature(asignatures);
            })
            .fail(function( jqXHR, textStatus, errorThrown ) {})
            .always(function( data, textStatus, jqXHR ) {
                @if(old('asignature'))
                    __.asignature.val({{ old('asignature') }}).trigger('select2:select');
                @endif
                @if(old('group'))
                    __.group.val({{ old('group') }}).trigger('select2:select');
                @endif

                @if(isset($report))
                    // on edit view
                    __.asignature.val({{ $report->asignature }}).trigger('select2:select');
                    __.group.val({{ $report->group }}).trigger('select2:select');
                @endif
            });
        });
        __.user.on("select2:opening", function (e) { 
            __.clearOptions();
            __.clearValues();
        });
        __.user.on("select2:unselect", function (e) { 
            __.clearOptions();
            __.clearValues();
        });

        __.asignature.on("select2:select", function (e) { 
            // e.target.value is asignature id selected
            console.log('trigger event ASIGNATURE');
            const id =  e.target.value;
            __.setGroup(Number(id));
        });
         __.asignature.on("select2:opening", function (e) {
             __.group.select2().empty();
            // $('#from').val(null);
            // $('#to').val(null);
        });

        // __.group.on("select2:select", function (e) { 
        //     const id =  e.target.value;
        //     __.setSchedule(Number(id));
        // });
        //  __.group.on("select2:opening", function (e) {
        //     $('#from').val(null);
        //     $('#to').val(null);
        // });
    </script>
    
    <script>
        @if(old('user'))
            __.user.val({{ old('user') }}).trigger('select2:select');
        @endif
        @if(isset($report))
            // on edit view
            __.user.val({{ $report->user }}).trigger('select2:select');
        @endif
    </script>
@endsection
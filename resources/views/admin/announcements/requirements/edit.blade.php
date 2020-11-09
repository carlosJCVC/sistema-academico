@extends('admin.layouts.app')

@section('htmlheader_title')
    Requisitos
@endsection

@section('styles')
    <link href="{{ asset('assets/css/font-awesome-4.6.1/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/util.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-edit"></i>Editar convocatoria</div>
                    <div class="card-body">

                        <form class="form-horizontal" action="{{ route('admin.requirements.update', [ 'announcement' => $announcement, 'requirement' => $requirement ] ) }}" method="POST" autocomplete="off">
                            {{ method_field('PUT')}}
                            {{ csrf_field() }}

                            @include('admin.announcements.requirements.form')

                            <div class="form-actions text-center">
                                <button class="btn btn-outline-primary" type="submit">Guardar</button>
                                <a class="btn btn-outline-danger" href="{{ route('admin.requirements.index', [ 'announcement' => $announcement->id ]) }}">Cancelar</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script src="{{ asset('assets/js/plugins/select2/select2.js') }}"></script>
    {{--<script src="{{ asset('assets/js/plugins/ckeditor/ckeditor.js')  }}"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>--}}
    <script>
        (function () {
            const root = document.querySelector('.ex-inputs');
            const rootC = document.querySelector('.ex-inputs-calification');
            const txtDurationStart = document.querySelector('.ex-inputs-start');
            const txtDurationEnd = document.querySelector('.ex-inputs-end');
            const txtCalificationStart = document.querySelector('.ex-inputs-calification-start');
            const txtCalificationEnd = document.querySelector('.ex-inputs-calification-end');
            const containerDuration = document.querySelector('.ex-inputs-picker');
            const containerCalification = document.querySelector('.ex-inputs-calification-picker');

            let options = {
                lang: {
                    months: [
                        'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                        'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                    ]
                }
            }

            const openPicker = (container, txtStart, txtEnd) => {
                // Inject DateRangePicker into our container
                DateRangePicker.DateRangePicker(container, {
                    startOpts: options
                })
                    .on('statechange', function (_, picker) {
                        // Update the inputs when the state changes
                        var range = picker.state;
                        console.log('aaaa', range.start)
                        txtStart.value = range.start ? range.start.toDateString() : '';
                        txtEnd.value = range.end ? range.end.toDateString() : '';
                    });
            }

            openPicker(containerDuration, txtDurationStart, txtDurationEnd)
            openPicker(containerCalification, txtCalificationStart, txtCalificationEnd)

            // When the inputs gain focus, show the date range picker
            txtDurationStart.addEventListener('focus', showDurationPicker);
            txtDurationEnd.addEventListener('focus', showDurationPicker);
            txtCalificationStart.addEventListener('focus', showCalificationPicker);
            txtCalificationEnd.addEventListener('focus', showCalificationPicker);

            function showDurationPicker() {
                containerDuration.classList.add('ex-inputs-picker-visible');
            }

            function showCalificationPicker() {
                containerCalification.classList.add('ex-inputs-picker-visible');
            }

            const closePicker = (rootContainer, container) => {
                // If focus leaves the root element, it is not in the date
                // picker or the inputs, so we should hide the date picker
                // we do this in a setTimeout because redraws cause temporary
                // loss of focus.
                let previousTimeout;
                rootContainer.addEventListener('focusout', function hidePicker() {
                    clearTimeout(previousTimeout);
                    previousTimeout = setTimeout(function() {
                        if (!rootContainer.contains(document.activeElement)) {
                            container.classList.remove('ex-inputs-picker-visible');
                        }
                    }, 10);
                });
            }

            closePicker(root, containerDuration)
            closePicker(rootC, containerCalification)


            $('.js-example-basic-multiple').select2({
                placeholder: "Seleccione un valor",
                allowClear: true
            });

        }());
    </script>
@endsection
@extends('admin.layouts.app')

@section('htmlheader_title')
    Planillas - Asistencia y Avance
@endsection

@section('styles')
    <link href="{{ asset('assets/css/font-awesome-4.6.1/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/util.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/yearpicker/dist/yearpicker.css') }}" rel="stylesheet" type="text/css" />
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
                        <i class="fa fa-edit"></i>Seleccionar Informe Asistencia y Avance</div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.asistencia-avance.planillas.post') }}" method="POST">
                            {{ csrf_field() }}

                            @include('admin.reports.planillas.form')

                            <div class="form-actions text-center">
                                <button class="btn btn-outline-primary" type="submit">Mostrar</button>
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
    <script src="{{ asset('assets/yearpicker/dist/yearpicker.js') }}"></script>
    <script>
        $('#user').select2({
            placeholder: "Seleccione un valor",
            allowClear: true,
        });

        $('#year').yearpicker({
            // Auto Hide
            autoHide: true,
            // Initial Year
            year: null,
            // Start Year
            startYear: 1990,
            // End Year
            endYear: 2030
        });
    </script>

    <script>

        const formatDate = d => {
            return `${d.getDate()}-${d.getMonth() + 1}-${d.getFullYear()}`;
        }

        const root = document.querySelector('.ex-inputs');
        const txtStart = root.querySelector('.ex-inputs-start');
        const txtEnd = root.querySelector('.ex-inputs-end');
        const container = root.querySelector('.ex-inputs-picker');

        DateRangePicker(container, {
            startOpts: {
                lang: {
                days: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
                months: [
                    'Enero',
                    'Febrero',
                    'Marzo',
                    'Abril',
                    'Mayo',
                    'Junio',
                    'Julio',
                    'Agosto',
                    'Septiembre',
                    'Octubre',
                    'Noviembre',
                    'Diciembre',
                ]
            }
            },
        })
            .on('statechange', function (_, rp) {
                // Update the inputs when the state changes
                var range = rp.state;
                console.log(range);
                // txtStart.value = range.start ? range.start.toDateString() : '';
                // txtEnd.value = range.end ? range.end.toDateString() : '';
                txtStart.value = range.start ? formatDate(range.start) : '';
                txtEnd.value = range.end ? formatDate(range.end) : '';
            });

            // When the inputs gain focus, show the date range picker
            txtStart.addEventListener('focus', showPicker);
            txtEnd.addEventListener('focus', showPicker);

            function showPicker() {
            container.classList.add('ex-inputs-picker-visible');
            }

            // If focus leaves the root element, it is not in the date
            // picker or the inputs, so we should hide the date picker
            // we do this in a setTimeout because redraws cause temporary
            // loss of focus.
            let previousTimeout;
            root.addEventListener('focusout', function hidePicker() {
            clearTimeout(previousTimeout);
            previousTimeout = setTimeout(function() {
                if (!root.contains(document.activeElement)) {
                container.classList.remove('ex-inputs-picker-visible');
                }
            }, 10);
        });

    </script>
@endsection

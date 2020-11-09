@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header text-center">
            <b>
                CONVOCATORIA A CONCURSO DE MÉRITOS Y PRUEBAS DE <br> CONOCIMIENTOS PARA OPTAR A AUXILIATURAS DE DOCENCIA
            </b>
        </div>

        <div class="card-body">
            <p>El Departamento de Informática y Sistemas junto a las Carreras de Ing. Informática e Ing.
                De Sistemas de la Facultad de Ciencias y Tecnología, convoca al concurso de méritos y
                examen de competencia para la provisión de Auxiliares del Departamento, tomando como
                base los requerimientos que se tienen programados para la gestión 2020.</p>
        
            <ol type="1">
                <li>
                    <b>REQUERIMIENTOS</b>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ITEMS</th>
                            <th scope="col">CANTIDAD</th>
                            <th scope="col">HORAS ACADEMICAS</th>
                            <th scope="col">DESTINO</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($announcement->requirements as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $item->quantity }} Aux.</td>
                                    <td>{{ $item->hours }} Hrs/mes</td>
                                    <td>{{ $item->destine }}</td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="4">
                                    <span class="d-block badge badge-danger">Sin items</span>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </li>

                <li>
                    <b>REQUISITOS</b>
                    <ol type="a">
                        @forelse($announcement->conditions as $item)
                            <li>{{ $item->description }}</li>
                        @empty
                        <span class="d-block badge badge-danger">Sin items</span>
                        @endforelse
                    </ol>
                </li>
                <li>
                    <b>DOCUMENTOS A PRESENTAR</b>
                    <ol type="a">
                        @forelse($announcement->documents as $item)
                            <li>{{ $item->description }}</li>
                        @empty
                        @endforelse
                    </ol>
                </li>
            </ol>
            
            <br>
            
            <b>NOTA.-</b> Toda la documentación se legalizará gratuitamente en Secretaria del Departamento
            de Informática y Sistemas. (Presentar original y fotocopias). La documentación no será
            devuelta.

            <ol type="1" start="4">
                <li>
                    <b>DE LA FORMA</b>
                    <span class="d-block">
                        Presentación de la documentación en sobre manila cerrado y rotulado con:
                    </span>
                    <ol type="I">
                        <li>Nombre y apellidos completos, dirección, teléfono(s) y e-mail del postulante,</li>
                        <li>Código(s) de item de la(s) auxiliatura(s) a la(s) que se postula.</li>
                        <li>Nombre(s) de la(s) auxiliatura(s) a la(s) que se presenta</li>
                    </ol>
                </li>
                <li>
                    <b>FECHA DE PRESENTACIÓN</b>
                    <span class="d-block">Presentación de la documentación en sobre Manila cerrado y rotulado con los siguientes
                        datos: Nombre y Apellido, dirección, teléfono y e-mail; hasta {{ $announcement->end_date_announcement }} en Secretaria del Departamento de Informática - Sistemas.</span>
                </li>
                <li>
                    <b>DE LA CALIFICACIÓN DE MÉRITOS</b>
                    <span class="d-block">La calificación de méritos se basará en los documentos presentados por el postulante y se
                        realizará sobre la base de 100 puntos que representa el 20% del puntaje final y se ponderará
                        de la siguiente manera.</span>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">DESCRIPCIÓN DE MERITOS</th>
                                <th scope="col">PORCENTAJE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($announcement->califications as $item)
                                <tr>
                                    <td>
                                        <b>{{$item->title}}</b>
                                        <span class="d-block">
                                            {{$item->description}}
                                        </span>

                                        <ol type="a">
                                            @forelse ($item->subcalifications as $subitem)
                                            <li>{{$subitem->description}} .............{{$subitem->percentage*100}} %</li>
                                            @empty
                                                <span class="badge badge-success">Sin items</span>                                            
                                            @endforelse
                                        </ol>
                                    </td>
                                    <td>{{$item->percentage*100}} %</td>
                                </tr>
                            @empty
                            <span class="d-block badge badge-danger">Sin items</span>
                            @endforelse
                        </tbody>
                    </table>
                </li>
                
                <li>
                    <b>CALIFICACIÓN DE CONOCIMIENTOS</b>

                    @if (!$announcement->ratings->isEmpty())
                        <span class="d-block">{{$announcement->ratings[0]->description}}</span>
                        <ol type="a">
                            @forelse ($announcement->ratings[0]->subratings as $item)
                                <li>{{$item->description}}........................{{$item->percentage*100}} %</li>
                            @empty
                            <span class="d-block badge badge-danger">Sin items</span>
                            @endforelse
                        </ol>
                    @else
                    <span class="d-block badge badge-danger">Sin items</span>
                    @endif
                </li>

                <li>
                    <b>DE LOS TRIBUNALES</b>
                    <span class="d-block">Los Honorables Consejos de Carrera de Informática y Sistemas designarán respectivamente;
                        para la calificación de méritos 1 docente y 1 delegado estudiante y para la comisión de
                        conocimientos 1 docente por asignatura convocada más un estudiante veedor.</span>
                </li>

                <li>
                    <b>FECHAS DE LAS PRUEBAS</b>
                    <span class="d-block">Las pruebas escritas serán sobre el contenido de la materia a la que postula y la nota de
                        aprobación mayor o igual a 51.</span>
                    <span class="d-block">Las pruebas orales, se tomarán solo a los postulantes que hayan vencido la prueba escrita
                        y de acuerdo a pertinencia y contenido de la materia a la que se postula.
                        Fechas importantes a considerar:</span>

                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">EVENTOS</th>
                                <th scope="col">FECHAS</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse ($announcement->events as $item)
                                <tr>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->date}}</td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="4">
                                    <span class="d-block badge badge-danger">Sin items</span>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </li>
            </ol>
            <br>
            <span><b>NOTA.-</b> Para Introducción a la Programación y Elementos de Programación y Estructura de
                Datos, el lenguaje es Java como tecnología de aplicación en la toma de exámenes. Para
                Computación I se considera el entorno Visual Basic como tecnología de aplicación en la
                toma de exámenes.</span>
            <br>

            <ol type="1" start="10">
                <li>
                    <b>DEL NOMBRAMIENTO</b>
                    <span class="d-block">
                        Los nombramientos de auxiliar universitario titular recaerán sobre aquellos postulantes que
hubieran aprobado y obtenido mayor calificación. Caso contrario se procederá con el
nombramiento de aquel que tenga la calificación mayor como auxiliar invitado.
                    </span>
                    <br>
                    <span class="d-block">
                        Cabe resaltar que un auxiliar invitado solo tendrá nombramiento por los periodos
académicos del semestre I y II de 2020.
                    </span>
                </li>
            </ol>

            <div class="text-center">
                <a href="{{ route('postulans.create', [ 'announcement' => $announcement->id ]) }}" class="btn btn-success">Registrarse</a>
            </div>
        </div>
    </div>
@endsection
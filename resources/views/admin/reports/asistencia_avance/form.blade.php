<div class="form-row">
    <div class="col-md-6 col-xs-12 mb-3">
        <label class="col-form-label" for="user">Docente/Auxiliar : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">D/A</button>
            </span>
            <select class="select2" name="user" id="user">
                <option></option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('user', isset($report) ? $report->user : '') == $user->id ? 'selected' : '' }}>{{ $user->name}}</option>    
                @endforeach
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('user')? 'd-block' : '' }}">
            {{ $errors->has('user')? $errors->first('user') : 'El campo es requerido'  }}
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-6 col-xs-12 mb-3">
        <label class="col-form-label" for="cod_sis">Codigo SIS : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">SIS</button>
            </span>
            <input
                class="form-control {{ $errors->has('cod_sis') ? 'is-invalid' : '' }}"
                name="cod_sis"
                id="cod_sis"
                readonly
                placeholder="Ingrese codigo SIS" type="text"  value="{{ old('cod_sis', isset($report) ? $report->cod_sis : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('cod_sis')? 'd-block' : '' }}">
            {{ $errors->has('cod_sis')? $errors->first('cod_sis') : 'El campo es requerido'  }}
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-4 mb-3">
        <label class="col-form-label" for="asignature">Materia : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button" disabled>A</button>
            </span>
            <select class="select2" name="asignature" id="asignature">
                <option></option>
                @foreach ($asignatures as $asignature)
                    <option value="{{ $asignature->id }}" {{ old('asignature', isset($report) ? $report->asignature : '') == $asignature->id ? 'selected' : '' }}>
                        {{ $asignature->name}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('asignature')? 'd-block' : '' }}">
            {{ $errors->has('asignature')? $errors->first('asignature') : 'El campo de materia es requerido'  }}
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <label class="col-form-label" for="group">Grupo: </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button" disabled>G</button>
            </span>
            <select class="select2 {{ $errors->has('group') ? 'is-invalid' : '' }}" name="group" id="group">
                <option></option>
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}" {{ (isset($report) && $report->group == $group->id) ? 'selected' : '' }}>
                        {{ $group->group}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('group')? 'd-block' : '' }}">
            {{ $errors->has('group')? $errors->first('group') : 'El campo es requerido'  }}
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <label class="col-form-label" for="date">Seleccione Fecha : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">DATE</button>
            </span>
            <input
                class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}"
                name="date"
                id="date"
                readonly
                placeholder="Seleccione la fecha" type="text" value="{{ old('date', isset($report) ? $report->date : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('date')? 'd-block' : '' }}">
            {{ $errors->has('date')? $errors->first('date') : 'El campo es requerido'  }}
        </div>
    </div>
</div>

<div class="form-row">
    {{-- <div class="col-md-4 mb-3">
        <label class="col-form-label" for="from">De : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">TIME</button>
            </span>
            <input
                class="form-control {{ $errors->has('from') ? 'is-invalid' : '' }}"
                name="from"
                id="from"
                readonly
                placeholder="Ingrese la hora" type="time" value="{{ old('from', isset($report) ? $report->from : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('from')? 'd-block' : '' }}">
            {{ $errors->has('from')? $errors->first('from') : 'El campo es requerido'  }}
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <label class="col-form-label" for="to">A: </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">TIME</button>
            </span>
            <input
                class="form-control {{ $errors->has('to') ? 'is-invalid' : '' }}"
                name="to"
                id="to"
                readonly
                placeholder="Ingrese la hora" type="time"  value="{{ old('to', isset($report) ? $report->to : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('to')? 'd-block' : '' }}">
            {{ $errors->has('to')? $errors->first('to') : 'Este campo es requerido'  }}
        </div>
    </div> --}}

    

    <div class="col-md-12 mb-3">
        <label class="col-form-label" for="bodyclass">Contenido de clase: </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">TEXT</button>
            </span>
            <textarea
                class="form-control {{ $errors->has('bodyclass') ? 'is-invalid' : '' }}"
                name="bodyclass"
                placeholder="Ingrese el contenido de la materia">{{ old('bodyclass', isset($report) ? $report->bodyclass : '') }}</textarea>
        </div>

        <div class="invalid-feedback {{ $errors->has('bodyclass')? 'd-block' : '' }}">
            {{ $errors->has('bodyclass')? $errors->first('bodyclass') : 'El campo es requerido' }}
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <label class="col-form-label" for="resourcesbody">Plataforma o medios utilizados: </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">TEXT</button>
            </span>
            <textarea
                class="form-control {{ $errors->has('resourcesbody') ? 'is-invalid' : '' }}"
                name="resourcesbody"
                placeholder="Ingrese el contenido de la materia">{{ old('resourcesbody', isset($report) ? $report->resourcesbody : '') }}</textarea>
        </div>

        <div class="invalid-feedback {{ $errors->has('resourcesbody')? 'd-block' : '' }}">
            {{ $errors->has('resourcesbody')? $errors->first('resourcesbody') : 'El campo es requerido' }}
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <label class="col-form-label" for="observations">Observaciones: </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">TEXT</button>
            </span>
            <textarea
                class="form-control {{ $errors->has('observations') ? 'is-invalid' : '' }}"
                name="observations"
                placeholder="Ingrese el contenido de la materia">{{ old('observations', isset($report) ? $report->observations : '') }}</textarea>
        </div>

        <div class="invalid-feedback {{ $errors->has('observations')? 'd-block' : '' }}">
            {{ $errors->has('observations')? $errors->first('observations') : 'El campo es requerido' }}
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <label class="col-form-label">Archivo (opcional): </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">FILE</button>
            </span>
            <label for="file" class="btn border" style="cursor: pointer;">
                <i class="fa fa-cloud-upload"></i>&nbsp;Seleccionar documento
            </label>
            <label id="filename" class="btn btn-block border">
                @if(isset($report) && $report->has_file)
                <strong>{{ $report->filename }}</strong>
                @else
                <strong class="text-capitalize">no hay documento</strong>
                @endif
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
</div>

<script>
    TinyDatePicker('#date', {
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
            ],
            today: 'Hoy',
            clear: 'Limpiar',
            close: 'Cerrar',
        },
        mode: 'dp-below',
    });

    $("#file").change(function(){
        $("#filename strong").text(this.files[0].name);
    });
</script>

<div class="form-row">

    <div class="col-md-12 mb-3">
        <label class="col-form-label" for="group">Numero grupo</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">G</button>
            </span>
            <input
                class="form-control {{ $errors->has('group') ? 'is-invalid' : '' }}"
                name="group"
                placeholder="Ingrese Numero de grupo" type="text"  value="{{ old('group', isset($group) ? $group->group : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('group')? 'd-block' : '' }}">
            {{ $errors->has('group')? $errors->first('group') : 'El campo numero de grupo es requerido'  }}
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <label class="col-form-label" for="asignature">Materia : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">M</button>
            </span>
            <select class="select2" name="asignature" id="asignature">
                @foreach ($asignatures as $asignature)
                    <option value="{{ $asignature->id }}" {{ (isset($group) && $group->asignature_id == $asignature->id)? 'selected' : '' }}>{{ $asignature->name}}</option>    
                @endforeach
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('asignature')? 'd-block' : '' }}">
            {{ $errors->has('asignature')? $errors->first('asignature') : 'El campo de materia es requerido'  }}
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <label class="col-form-label" for="titular">Docente : </label>
        <input type="hidden" name="teachers[0][titular]" value="1">
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">D</button>
            </span>
            <select class="select2" name="teachers[0][key]" id="titular">
                @foreach ($teachers as $titular)
                    <option value="{{ $titular->id }}" {{ (isset($group) && $group->teachers[0]->teacher == $titular->id) ? 'selected' : '' }}>{{ $titular->name}}</option>    
                @endforeach
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('titular')? 'd-block' : '' }}">
            {{ $errors->has('titular')? $errors->first('titular') : 'El campo de docente es requerido'  }}
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <label class="col-form-label" for="name">De : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">TIME</button>
            </span>
            <input
                class="form-control {{ $errors->has('from') ? 'is-invalid' : '' }}"
                name="teachers[0][from]"
                placeholder="Ingrese la hora" type="time"  value="{{ old('from', isset($group) ? $group->teachers[0]->from : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('from')? 'd-block' : '' }}">
            {{ $errors->has('from')? $errors->first('from') : 'El campo es requerido'  }}
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <label class="col-form-label" for="name">A: </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">TIME</button>
            </span>
            <input
                class="form-control {{ $errors->has('to') ? 'is-invalid' : '' }}"
                name="teachers[0][to]"
                placeholder="Ingrese la hora" type="time"  value="{{ old('to', isset($group) ? $group->teachers[0]->to : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('to')? 'd-block' : '' }}">
            {{ $errors->has('to')? $errors->first('to') : 'Este campo es requerido'  }}
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <label class="col-form-label" for="day">Dia : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">D</button>
            </span>
            <select class="form-control" name="teachers[0][day]" id="day">
                <option value="LU" {{ (isset($group) && $group->teachers[0]->day == 'LU')? 'selected' : '' }}>Lunes</option>
                <option value="MA" {{ (isset($group) && $group->teachers[0]->day == 'MA')? 'selected' : '' }}>Martes</option>
                <option value="MI" {{ (isset($group) && $group->teachers[0]->day == 'MI')? 'selected' : '' }}>Miercoles</option>
                <option value="JU" {{ (isset($group) && $group->teachers[0]->day == 'JU')? 'selected' : '' }}>Jueves</option>
                <option value="VI" {{ (isset($group) && $group->teachers[0]->day == 'VI')? 'selected' : '' }}>Viernes</option>
                <option value="SA" {{ (isset($group) && $group->teachers[0]->day == 'SA')? 'selected' : '' }}>Sabado</option>
                <option value="DO" {{ (isset($group) && $group->teachers[0]->day == 'DO')? 'selected' : '' }}>Domingo</option>
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('day')? 'd-block' : '' }}">
            {{ $errors->has('day')? $errors->first('day') : 'El campo dia es requerido'  }}
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <label class="col-form-label" for="auxiliar">Auxiliar : </label>
        <input type="hidden" name="teachers[1][titular]" value="0">
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">A</button>
            </span>
            <select class="select2" name="teachers[1][key]" id="auxiliar">
                @foreach ($auxiliares as $auxiliar)
                    <option value="{{ $auxiliar->id }}" {{ (isset($group) && $group->teachers[1]->teacher == $auxiliar->id) ? 'selected' : '' }}>{{ $auxiliar->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('auxiliar')? 'd-block' : '' }}">
            {{ $errors->has('auxiliar')? $errors->first('auxiliar') : 'El campo de auxiliar es requerido'  }}
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <label class="col-form-label" for="name">De : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">TIME</button>
            </span>
            <input
                class="form-control {{ $errors->has('from') ? 'is-invalid' : '' }}"
                name="teachers[1][from]"
                placeholder="Ingrese la hora" type="time"  value="{{ old('from', isset($group) ? $group->teachers[1]->from : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('from')? 'd-block' : '' }}">
            {{ $errors->has('from')? $errors->first('from') : 'El campo es requerido'  }}
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <label class="col-form-label" for="name">A: </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">TIME</button>
            </span>
            <input
                class="form-control {{ $errors->has('to') ? 'is-invalid' : '' }}"
                name="teachers[1][to]"
                placeholder="Ingrese la hora" type="time"  value="{{ old('to', isset($group) ? $group->teachers[1]->to : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('to')? 'd-block' : '' }}">
            {{ $errors->has('to')? $errors->first('to') : 'Este campo es requerido'  }}
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <label class="col-form-label" for="day">Dia : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">D</button>
            </span>
            <select class="form-control" name="teachers[1][day]" id="day">
                <option value="LU" {{ (isset($group) && $group->teachers[1]->day == 'LU')? 'selected' : '' }}>Lunes</option>
                <option value="MA" {{ (isset($group) && $group->teachers[1]->day == 'MA')? 'selected' : '' }}>Martes</option>
                <option value="MI" {{ (isset($group) && $group->teachers[1]->day == 'MI')? 'selected' : '' }}>Miercoles</option>
                <option value="JU" {{ (isset($group) && $group->teachers[1]->day == 'JU')? 'selected' : '' }}>Jueves</option>
                <option value="VI" {{ (isset($group) && $group->teachers[1]->day == 'VI')? 'selected' : '' }}>Viernes</option>
                <option value="SA" {{ (isset($group) && $group->teachers[1]->day == 'SA')? 'selected' : '' }}>Sabado</option>
                <option value="DO" {{ (isset($group) && $group->teachers[1]->day == 'DO')? 'selected' : '' }}>Domingo</option>
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('day')? 'd-block' : '' }}">
            {{ $errors->has('day')? $errors->first('day') : 'El campo dia es requerido'  }}
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</div>

@section('scripts')
    <script>
    $('.select2').select2({
        placeholder: "Seleccione un valor",
        allowClear: true,
    });
    </script>
@endsection
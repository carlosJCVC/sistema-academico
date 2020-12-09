@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="form-row">
    <div class="col-md-4 mx-auto mb-3">
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
</div>

<div class="form-row">
     <div class="col-md-4 mx-auto mb-3">
        <label class="col-form-label" for="asignature">Materia : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">M</button>
            </span>
            <select class="select2" name="asignature" id="asignature">
                @foreach ($asignatures as $asignature)
                    <option value="{{ $asignature->id }}" {{ old('asignature', isset($group) ? $group->asignature_id : '') == $asignature->id ? 'selected' : '' }}>
                        {{ $asignature->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('asignature')? 'd-block' : '' }}">
            {{ $errors->has('asignature')? $errors->first('asignature') : 'El campo de materia es requerido'  }}
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-4 mx-auto mb-3">
        <label class="col-form-label" for="titular">Docente : </label>
        <input type="hidden" name="teachers[0][titular]" value="1">
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">D</button>
            </span>
            <select class="select2" name="teachers[0][key]" id="titular">
                <option value="">....</option>
                @foreach ($teachers as $titular)
                    <option value="{{ $titular->id }}" {{ old('teachers.0.key', isset($group) ? $group->getTitular() : '') == $titular->id ? 'selected' : '' }}>
                        {{ $titular->name}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('titular')? 'd-block' : '' }}">
            {{ $errors->has('titular')? $errors->first('titular') : 'El campo de docente es requerido'  }}
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-4 mx-auto mb-3">
        <label class="col-form-label" for="">Horarios docente : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">D</button>
            </span>
            <select class="select2" name="teachers[0][schedules][]" id="" multiple="multiple">
                @foreach ($schedules as $schedule)
                    <option value="{{ $schedule->id }}" {{ (collect(old('teachers.0.schedules', isset($group) ? $group->getTitularSchedules() : []))->contains($schedule->id)) ? 'selected':'' }}>
                        {{ $schedule->formatSchedule()}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('schedule')? 'd-block' : '' }}">
            {{ $errors->has('schedule')? $errors->first('schedule') : 'El campo de docente es requerido'  }}
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-4 mx-auto mb-3">
        <label class="col-form-label" for="auxiliar">Auxiliar : </label>
        <input type="hidden" name="teachers[1][titular]" value="0">
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">A</button>
            </span>
            <select class="select2" name="teachers[1][key]" id="auxiliar">
                <option value="">....</option>
                @foreach ($auxiliares as $auxiliar)
                    <option value="{{ $auxiliar->id }}" {{ old('teachers.1.key', isset($group) ? $group->getAuxiliar() : '') == $auxiliar->id ? 'selected' : '' }}>
                        {{ $auxiliar->name}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('auxiliar')? 'd-block' : '' }}">
            {{ $errors->has('auxiliar')? $errors->first('auxiliar') : 'El campo de auxiliar es requerido'  }}
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-4 mx-auto mb-3">
        <label class="col-form-label" for="">Horario auxiliar : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">D</button>
            </span>
            <select class="select2" name="teachers[1][schedules][]" id="" multiple="multiple">
                @foreach ($schedules as $schedule)
                    <option value="{{ $schedule->id }}" {{ (collect(old('teachers.1.schedules', isset($group) ? $group->getAuxiliarSchedules() : []))->contains($schedule->id)) ? 'selected':'' }}>
                        {{ $schedule->formatSchedule()}}
                    </option>    
                @endforeach
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('schedule')? 'd-block' : '' }}">
            {{ $errors->has('schedule')? $errors->first('schedule') : 'El campo de docente es requerido'  }}
        </div>
    </div>
</div>

{{-- <div class="form-row"></div> --}}

{{-- 
Old values when select is multiple
https://stackoverflow.com/questions/35611945/old-value-in-multiple-select-option-in-laravel-blade
https://5balloons.info/laravel-validation-retain-old-values-in-multiple-select-box-in/
--}}

@section('scripts')
    <script>
    $('.select2').select2({
        placeholder: "Seleccione un valor",
        allowClear: true,
    });
    </script>
@endsection
<div class="form-row">
    <div class="col-md-6 mx-auto col-xs-12 mb-3">
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
            {{ $errors->has('user')? $errors->first('user') : 'Este campo es requerido'  }}
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-3">&nbsp;</div>
    <div class="col-md-3 mb-3">
        <label class="col-form-label" for="year">A&ntilde;o</label>
        <input class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}"
                    type="text"  
                    name="year"
                    id="year" value="{{ old('year', isset($asignature) ? $asignature->year : '') }}">

        <div class="invalid-feedback {{ $errors->has('year')? 'd-block' : '' }}">
            {{ $errors->has('year')? $errors->first('year') : 'Este campo es requerido'  }}
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <label class="col-form-label" for="number">Gestion : </label>
        <select class="form-control" name="number" id="number">
            <option value="I" {{ (isset($asignature) && $asignature->number == 'I')? 'selected' : '' }}>I</option>
            <option value="II" {{ (isset($asignature) && $asignature->number == 'II')? 'selected' : '' }}>II</option>
            <option value="III" {{ (isset($asignature) && $asignature->number == 'III')? 'selected' : '' }}>III</option>
            <option value="IV" {{ (isset($asignature) && $asignature->number == 'IV')? 'selected' : '' }}>IV</option>
            <option value="V" {{ (isset($asignature) && $asignature->number == 'V')? 'selected' : '' }}>V</option>
        </select>

        <div class="invalid-feedback {{ $errors->has('number')? 'd-block' : '' }}">
            {{ $errors->has('number')? $errors->first('number') : 'Este campo es requerido'  }}
        </div>
    </div>
</div>

<div class="form-row ex-inputs mb-3">
    <div class="col-md-3 mb-3">&nbsp;</div>
    <div class="col-md-3 mb-3">
        <label class="col-form-label" for="from">Desde</label>
        <input
        type="text"
        readonly
        class="ex-inputs-start form-control {{ $errors->has('from') ? 'is-invalid' : '' }}"
        name="from"
        id="from">
        <div class="invalid-feedback {{ $errors->has('from')? 'd-block' : '' }}">
            {{ $errors->has('from')? $errors->first('from') : 'El campo es requerido'  }}
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <label class="col-form-label" for="to">Hasta</label>
        <input
        type="text"
        readonly
        class="ex-inputs-end form-control {{ $errors->has('to') ? 'is-invalid' : '' }}"
        name="to"
        id="to">
        <div class="invalid-feedback {{ $errors->has('to')? 'd-block' : '' }}">
            {{ $errors->has('to')? $errors->first('to') : 'Este campo es requerido'  }}
        </div>
    </div>
    <div class="ex-inputs-picker"></div>
</div>

{{-- <div class="col-md-4 mb-3">
    <label class="col-form-label" for="from">De : </label>
    <input
        type="text"
        class="form-control {{ $errors->has('from') ? 'is-invalid' : '' }}"
        name="from"
        id="from"
        placeholder="Ingrese la hora">

    <div class="invalid-feedback {{ $errors->has('from')? 'd-block' : '' }}">
        {{ $errors->has('from')? $errors->first('from') : 'El campo es requerido'  }}
    </div>
</div> --}}

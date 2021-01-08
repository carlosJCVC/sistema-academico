@if ($errors->has('number'))
<div class="form-row">
    <div class="col-md-12 mb-3">
        <div class="alert alert-danger">
            <ul>
                <li>{{ $errors->first('number') }}</li>
            </ul>
        </div>
    </div>
</div>
@endif

<div class="form-row">

    <div class="col-md-12 mb-3">
        <label class="col-form-label" for="name">Nombre</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">N</button>
            </span>
            <input
                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                    name="name"
                    placeholder="Ingrese Nombre de materia" type="text"  value="{{ old('name', isset($asignature) ? $asignature->name : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('name')? 'd-block' : '' }}">
            {{ $errors->has('name')? $errors->first('name') : 'El campo de Nombre de materia es requerido'  }}
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="year">A&ntilde;o</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">A</button>
            </span>
            <input class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}"
                    name="year"
                    placeholder="Ingrese el a&ntilde;o" type="text"  value="{{ old('year', isset($asignature) ? $asignature->year : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('year')? 'd-block' : '' }}">
            {{ $errors->has('year')? $errors->first('year') : 'Este campo es requerido'  }}
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="number">Gestion : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">G</button>
            </span>
            <select class="form-control" name="number" id="number">
                <option value="I" {{ (isset($asignature) && $asignature->number == 'I')? 'selected' : '' }}>I</option>
                <option value="II" {{ (isset($asignature) && $asignature->number == 'II')? 'selected' : '' }}>II</option>
                <option value="III" {{ (isset($asignature) && $asignature->number == 'III')? 'selected' : '' }}>III</option>
                <option value="IV" {{ (isset($asignature) && $asignature->number == 'IV')? 'selected' : '' }}>IV</option>
                <option value="V" {{ (isset($asignature) && $asignature->number == 'V')? 'selected' : '' }}>V</option>
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('number')? 'd-block' : '' }}">
            {{ $errors->has('number')? $errors->first('number') : 'El campo de gestion es requerido'  }}
        </div>
    </div>
</div>

{{-- @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif --}}
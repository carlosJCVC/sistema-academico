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
                    <option value="{{ $user->id }}" {{ old('user', isset($classe) ? $classe->user : '') == $user->id ? 'selected' : '' }}>
                        {{ $user->name}}
                    </option>    
                @endforeach
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('user')? 'd-block' : '' }}">
            {{ $errors->has('user')? $errors->first('user') : 'El campo es requerido'  }}
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="asignature">Materia : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button" disabled>A</button>
            </span>
            <select class="select2" name="asignature" id="asignature">
                <option></option>
                @foreach ($asignatures as $asignature)
                    <option value="{{ $asignature->id }}" {{ old('asignature', isset($classe) ? $classe->asignature : '') == $asignature->id ? 'selected' : '' }}>
                        {{ $asignature->name}}
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
    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="date_suspended">Seleccione Fecha de clase suspendida : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">DATE</button>
            </span>
            <input
                class="fechas form-control {{ $errors->has('date_suspended') ? 'is-invalid' : '' }}"
                name="date_suspended"
                id="date_suspended"
                readonly
                placeholder="Seleccione la fecha" type="text" value="{{ old('date_suspended', isset($classe) ? $classe->date_suspended : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('date_suspended')? 'd-block' : '' }}">
            {{ $errors->has('date_suspended')? $errors->first('date_suspended') : 'El campo es requerido'  }}
        </div>
    </div>
    <div class="col-md-12 mb-3">
        <label class="col-form-label" for="reason">Causa o motivo de suspencion: </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">TEXT</button>
            </span>
            <textarea
                class="form-control {{ $errors->has('reason') ? 'is-invalid' : '' }}"
                name="reason"
                placeholder="Ingrese justificacion">{{ old('reason', isset($classe) ? $classe->reason : '') }}</textarea>
        </div>

        <div class="invalid-feedback {{ $errors->has('reason')? 'd-block' : '' }}">
            {{ $errors->has('reason')? $errors->first('reason') : 'El campo es requerido' }}
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-4 mb-3">
        <label class="col-form-label" for="date_reposition">Seleccione Fecha de clase reposicion : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">DATE</button>
            </span>
            <input
                class="fechas form-control {{ $errors->has('date_reposition') ? 'is-invalid' : '' }}"
                name="date_reposition"
                id="date_reposition"
                readonly
                placeholder="Seleccione la fecha" type="text" value="{{ old('date_reposition', isset($classe) ? $classe->date_reposition : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('date_reposition')? 'd-block' : '' }}">
            {{ $errors->has('date_reposition')? $errors->first('date_reposition') : 'El campo es requerido'  }}
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <label class="col-form-label" for="from">De : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">TIME</button>
            </span>
            <input
                class="form-control {{ $errors->has('from') ? 'is-invalid' : '' }}"
                name="from"
                id="from"
                placeholder="Ingrese la hora" type="time" value="{{ old('from', isset($classe) ? $classe->from : '') }}">
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
                placeholder="Ingrese la hora" type="time"  value="{{ old('to', isset($classe) ? $classe->to : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('to')? 'd-block' : '' }}">
            {{ $errors->has('to')? $errors->first('to') : 'Este campo es requerido'  }}
        </div>
    </div>
</div>
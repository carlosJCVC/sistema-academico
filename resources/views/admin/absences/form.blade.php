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
                    <option value="{{ $user->id }}" {{ old('user', isset($absence) ? $absence->user : '') == $user->id ? 'selected' : '' }}>
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
        <label class="col-form-label" for="date_absence">Seleccione Fecha de ausencia : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">DATE</button>
            </span>
            <input
                class="fechas form-control {{ $errors->has('date_absence') ? 'is-invalid' : '' }}"
                name="date_absence"
                id="date_absence"
                readonly
                placeholder="Seleccione la fecha" type="text" value="{{ old('date_absence', isset($absence) ? $absence->date_absence : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('date_absence')? 'd-block' : '' }}">
            {{ $errors->has('date_absence')? $errors->first('date_absence') : 'El campo es requerido'  }}
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="from">De : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">TIME</button>
            </span>
            <input
                class="form-control {{ $errors->has('from') ? 'is-invalid' : '' }}"
                name="from"
                id="from"
                placeholder="Ingrese la hora" type="time" value="{{ old('from', isset($absence) ? $absence->from : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('from')? 'd-block' : '' }}">
            {{ $errors->has('from')? $errors->first('from') : 'El campo es requerido'  }}
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="to">A: </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">TIME</button>
            </span>
            <input
                class="form-control {{ $errors->has('to') ? 'is-invalid' : '' }}"
                name="to"
                id="to"
                placeholder="Ingrese la hora" type="time"  value="{{ old('to', isset($absence) ? $absence->to : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('to')? 'd-block' : '' }}">
            {{ $errors->has('to')? $errors->first('to') : 'Este campo es requerido'  }}
        </div>
    </div>
</div>

<div class="form-row">
        <div class="col-md-12 mb-3">
        <label class="col-form-label" for="reason">Causa o motivo/Justificacion de ausencia: </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">TEXT</button>
            </span>
            <textarea
                class="form-control {{ $errors->has('reason') ? 'is-invalid' : '' }}"
                name="reason"
                placeholder="Ingrese justificacion">{{ old('reason', isset($absence) ? $absence->reason : '') }}</textarea>
        </div>

        <div class="invalid-feedback {{ $errors->has('reason')? 'd-block' : '' }}">
            {{ $errors->has('reason')? $errors->first('reason') : 'El campo es requerido' }}
        </div>
    </div>
</div>
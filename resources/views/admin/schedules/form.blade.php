<div class="form-row">

    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="name">Desde las : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">TIME</button>
            </span>
            <input
                    class="form-control {{ $errors->has('from') ? 'is-invalid' : '' }}"
                    name="from"
                    placeholder="Ingrese la hora" type="time"  value="{{ old('from', isset($schedule) ? $schedule->from : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('from')? 'd-block' : '' }}">
            {{ $errors->has('from')? $errors->first('from') : 'El campo de De es requerido'  }}
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="name">Hasta las : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">TIME</button>
            </span>
            <input
                    class="form-control {{ $errors->has('to') ? 'is-invalid' : '' }}"
                    name="to"
                    placeholder="Ingrese la hora" type="time"  value="{{ old('to', isset($schedule) ? $schedule->to : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('to')? 'd-block' : '' }}">
            {{ $errors->has('to')? $errors->first('to') : 'Este campo es requerido'  }}
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <label class="col-form-label" for="description">A : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">TIME</button>
            </span>
            <select class="form-control" name="day" id="day">
                <option value="LU" {{ (isset($schedule) && $schedule->day == 'LUNES')? 'selected' : '' }}>Lunes</option>
                <option value="MA" {{ (isset($schedule) && $schedule->day == 'MARTES')? 'selected' : '' }}>Martes</option>
                <option value="MI" {{ (isset($schedule) && $schedule->day == 'MIERCOLES')? 'selected' : '' }}>Miercoles</option>
                <option value="JU" {{ (isset($schedule) && $schedule->day == 'JUEVES')? 'selected' : '' }}>Jueves</option>
                <option value="VI" {{ (isset($schedule) && $schedule->day == 'VIERNES')? 'selected' : '' }}>Viernes</option>
                <option value="SA" {{ (isset($schedule) && $schedule->day == 'SABADO')? 'selected' : '' }}>Sabado</option>
                <option value="DO" {{ (isset($schedule) && $schedule->day == 'DOMINGO')? 'selected' : '' }}>Domingo</option>
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('description')? 'd-block' : '' }}">
            {{ $errors->has('description')? $errors->first('description') : 'El campo de Nombre es requerido'  }}
        </div>
    </div>
</div>
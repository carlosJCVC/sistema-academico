<div class="form-row">

    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="name">Desde las : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">TIME</button>
            </span>
            {{-- <input
                    class="form-control {{ $errors->has('from') || $errors->has('day') ? 'is-invalid' : '' }}"
                    name="from"
                    placeholder="Ingrese la hora" type="time"  value="{{ old('from', isset($schedule) ? $schedule->from : '') }}"> --}}
            <select class="select2" name="from" id="from">
                <option></option>
                @foreach ($schedules as $sch)
                    <option value="{{ $sch }}" {{ old('from', isset($schedule) ? $schedule->from : '') == $sch ? 'selected' : '' }}>
                        {{ $sch }}
                    </option>    
                @endforeach
            </select>
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
            {{-- <input
                    class="form-control {{ $errors->has('to') || $errors->has('day') ? 'is-invalid' : '' }}"
                    name="to"
                    placeholder="Ingrese la hora" type="time"  value="{{ old('to', isset($sfrome) ? $schedule->to : '') }}"> --}}
            <select class="select2" name="to" id="to">
                <option></option>
                @foreach ($schedules as $sch)
                    <option value="{{ $sch }}" {{ old('to', isset($schedule) ? $schedule->to : '') == $sch ? 'selected' : '' }}>
                        {{ $sch }}
                    </option>    
                @endforeach
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('to')? 'd-block' : '' }}">
            {{ $errors->has('to')? $errors->first('to') : 'Este campo es requerido'  }}
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <label class="col-form-label" for="description">Dia : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">D</button>
            </span>
            <select class="form-control {{ $errors->has('day') ? 'is-invalid' : '' }}" name="day" id="day">
                <option value="LU" {{ (isset($schedule) && $schedule->day == 'LUNES')? 'selected' : '' }}>Lunes</option>
                <option value="MA" {{ (isset($schedule) && $schedule->day == 'MARTES')? 'selected' : '' }}>Martes</option>
                <option value="MI" {{ (isset($schedule) && $schedule->day == 'MIERCOLES')? 'selected' : '' }}>Miercoles</option>
                <option value="JU" {{ (isset($schedule) && $schedule->day == 'JUEVES')? 'selected' : '' }}>Jueves</option>
                <option value="VI" {{ (isset($schedule) && $schedule->day == 'VIERNES')? 'selected' : '' }}>Viernes</option>
                <option value="SA" {{ (isset($schedule) && $schedule->day == 'SABADO')? 'selected' : '' }}>Sabado</option>
                <option value="DO" {{ (isset($schedule) && $schedule->day == 'DOMINGO')? 'selected' : '' }}>Domingo</option>
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('day')? 'd-block' : '' }}">
            {{ $errors->has('day')? $errors->first('day') : 'El campo de Dia es requerido'  }}
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
<script>
    $('.select2').select2({
        placeholder: "Seleccione un valor",
        allowClear: true,
    });
</script>

<div class="form-row">

    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="name">Nombre</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">N</button>
            </span>

            <input
                class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                name="name"
                placeholder="Ingrese del item" type="text"  value="{{ old('name', isset($item) ? $item->name : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('name')? 'd-block' : '' }}">
            {{ $errors->has('name')? $errors->first('name') : 'El campo de Nombre es requerido'  }}
        </div>
    </div>

    <div class="col-md-6 mb-3" id="level">
        <label class="col-form-label" for="level">Nivel</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">N</button>
            </span>
            <input
                class="form-control {{ $errors->has('level') ? 'is-invalid' : '' }}"
                name="level"
                placeholder="Ingrese Nivel del item" type="text"  value="{{ old('level', isset($item) ? $item->level : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('level')? 'd-block' : '' }}">
            {{ $errors->has('level')? $errors->first('level') : 'El campo de Nivel es requerido'  }}
        </div>
    </div>

    <div class="col-md-6 mb-3" id="teacher">
        <label class="col-form-label" for="teacher">Docente</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">N</button>
            </span>
            <input
                class="form-control {{ $errors->has('teacher') ? 'is-invalid' : '' }}"
                name="teacher"
                placeholder="Ingrese Docente de item" type="text"  value="{{ old('teacher', isset($item) ? $item->teacher : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('teacher')? 'd-block' : '' }}">
            {{ $errors->has('teacher')? $errors->first('teacher') : 'El campo de Nombre es requerido'  }}
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="destine">Destino</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">A</button>
            </span>

            <select class="form-control" name="destine" id="select-destine">
                <option value="LABORATORIO" {{ (isset($item) && $item->destine == 'LABORATORIO') ? 'selected' : '' }}>Laboratorio</option>
                <option value="DOCENCIA" {{ (isset($item) && $item->destine == 'DOCENCIA') ? 'selected' : '' }}>Docencia</option>
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('destine')? 'd-block' : '' }}">
            {{ $errors->has('destine')? $errors->first('destine') : 'Este campo es requerido'  }}
        </div>
    </div>

</div>
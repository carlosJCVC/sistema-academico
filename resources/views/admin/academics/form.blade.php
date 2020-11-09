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
                placeholder="Ingrese Nombre Academico" type="text"  value="{{ old('name', isset($academic) ? $academic->name : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('name')? 'd-block' : '' }}">
            {{ $errors->has('name')? $errors->first('name') : 'El campo de Nombre es requerido'  }}
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="status" id="customCheck1" {{ (isset($academic) && $academic->status) ? 'checked' : '' }}>
            <label class="custom-control-label" for="customCheck1">Habilitar/deshabilitar unidad académica.</label>
        </div>
    </div>
</div>
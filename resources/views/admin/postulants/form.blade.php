<div class="form-row">
    <div class="col-md-12 mb-3">
        <label class="col-form-label" for="observations">Observaciones</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">D</button>
            </span>
            <textarea
                    class="form-control {{ $errors->has('observations') ? 'is-invalid' : '' }}"
                    name="observations"
                    placeholder="Ingrese obvervaciones para inhabilitar" type="text">{{ old('observations', isset($postulant) ? $postulant->observations : '') }}</textarea>
        </div>

        <div class="invalid-feedback {{ $errors->has('observations')? 'd-block' : '' }}">
            {{ $errors->has('observations')? $errors->first('observations') : 'El campo de observaciones es requerido'  }}
        </div>
    </div>
</div>
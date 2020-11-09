<div class="form-row">
    <div class="col-md-12 mb-3">
        <label class="col-form-label" for="description">Descripcion/Titulo</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">D</button>
            </span>
            <textarea
                    class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                    name="description"
                    cols="30" rows="5"
                    placeholder="Ingrese una descripcion" type="text">{{ old('description', isset($document) ? $document->description : '') }}</textarea>
        </div>

        <div class="invalid-feedback {{ $errors->has('description')? 'd-block' : '' }}">
            {{ $errors->has('description')? $errors->first('description') : 'El campo description es requerido'  }}
        </div>
    </div>

</div>

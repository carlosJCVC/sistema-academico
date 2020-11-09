<div class="form-row">

    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label class="col-form-label" for="quantity">Cantidad de auxiliares</label>
            <div class="input-group">
                <span class="input-group-append">
                    <button class="btn btn-primary" type="button">T</button>
                </span>
                <input
                    class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}"
                    name="quantity"
                    placeholder="Ingrese La cantidad de auxiliares" type="number"  value="{{ old('quantity', isset($requirement) ? $requirement->quantity : '') }}">
            </div>
    
            <div class="invalid-feedback {{ $errors->has('quantity')? 'd-block' : '' }}">
                {{ $errors->has('quantity')? $errors->first('quantity') : 'El campo de Cantidad de auxiliares es requerido'  }}
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label class="col-form-label" for="hours">Horas académicas.</label>
            <div class="input-group">
                <span class="input-group-append">
                    <button class="btn btn-primary" type="button">Horas</button>
                </span>
                <input
                    class="form-control {{ $errors->has('hours') ? 'is-invalid' : '' }}"
                    name="hours"
                    placeholder="Ingrese horas académicas" type="number"  value="{{ old('hours', isset($requirement) ? $requirement->hours : '') }}">
            </div>
    
            <div class="invalid-feedback {{ $errors->has('hours')? 'd-block' : '' }}">
                {{ $errors->has('hours')? $errors->first('hours') : 'El campo de horas académicas es requerido'  }}
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label class="col-form-label" for="required">Tipo de requisito</label>
            <div class="input-group">
                <span class="input-group-append">
                    <button class="btn btn-primary" type="button">S</button>
                </span>
    
                <select class="form-control {{ $errors->has('required') ? 'is-invalid' : '' }}" name="required">
                    <option disabled hidden selected>Seleccione requisito</option>
                    <option value=1 {{ ( isset($requirement) && $requirement->required == true) ? 'selected' : '' }}>INDISPENSABLE</option>
                    <option value=0 {{ ( isset($requirement) && $requirement->required == false) ? 'selected' : '' }}>GENERAL</option>
                </select>
            </div>
    
            <div class="invalid-feedback {{ $errors->has('required')? 'd-block' : '' }}">
                {{ $errors->has('gender')? $errors->first('required') : 'El campo de genero es requerido'  }}
            </div>
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <label class="col-form-label" for="destine">Destino</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">D</button>
            </span>
            <textarea
                    class="form-control {{ $errors->has('destine') ? 'is-invalid' : '' }}"
                    name="destine"
                    cols="30" rows="5"
                    placeholder="Ingrese una descripcion" type="text">{{ old('destine', isset($requirement) ? $requirement->destine : '') }}</textarea>
        </div>

        <div class="invalid-feedback {{ $errors->has('destine')? 'd-block' : '' }}">
            {{ $errors->has('destine')? $errors->first('destine') : 'El campo de destino es requerido'  }}
        </div>
    </div>

</div>

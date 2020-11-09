<div class="form-row">

    <div class="col-md-12 mb-3">
        <label class="col-form-label" for="title">Titulo</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">T</button>
            </span>
            <input
                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                name="title"
                placeholder="Ingrese el title" type="text" value="{{ old('title', isset($subcalification) ? $subcalification->title : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('title')? 'd-block' : '' }}">
            {{ $errors->has('title')? $errors->first('title') : 'El campo titulo es requerido'  }}
        </div>
    </div>

    <div class="col-md-12 mb-2">
        <label class="col-form-label" for="percentage">Porcentaje</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">Cantidad disponible : {{ $total }} %</button>
            </span>
            <input
                class="form-control {{ $errors->has('percentage') ? 'is-invalid' : '' }}"
                name="percentage"
                placeholder="Ingrese el porcentaje de 1 a {{ $total }} %" type="text" value="{{ old('percentage', isset($subcalification) ? $subcalification->percentage*100 : '') }}">

                <div class="invalid-feedback {{ $errors->has('percentage')? 'd-block' : '' }}">
                {{ $errors->has('percentage')? $errors->first('percentage') : 'El campo de porcentaje es requerido'  }}
                </div>
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <label class="col-form-label" for="description">Descripcion</label>
        
        <textarea
            class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
            id="description"
            name="description"
            cols="30" rows="5"
            placeholder="Ingrese una descripcion" type="text">{{ old('description', isset($subcalification) ? $subcalification->description : '') }}</textarea>

        <div class="invalid-feedback {{ $errors->has('description')? 'd-block' : '' }}">
            {{ $errors->has('description')? $errors->first('description') : 'El campo description es requerido'  }}
        </div>
    </div>
</div>

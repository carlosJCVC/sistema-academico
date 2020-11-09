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
                placeholder="Ingrese el title" type="text" value="{{ old('title', isset($event) ? $event->title : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('title')? 'd-block' : '' }}">
            {{ $errors->has('title')? $errors->first('title') : 'El campo titulo es requerido'  }}
        </div>
    </div>

    <div class="col-md-12 mb-2">
        <label for="date" class="col-form-label">Fecha(*)</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">T</button>
            </span>
            <input
                type="date"
                class="form-control"
                name="date"
                placeholder="Fecha"
                value="{{ old('date', isset($event) ? $event->date : '') }}" >

                <div class="invalid-feedback {{ $errors->has('date')? 'd-block' : '' }}">
                {{ $errors->has('date')? $errors->first('date') : 'El campo de Fecha es requerido'  }}
                </div>
        </div>
    </div>

</div>
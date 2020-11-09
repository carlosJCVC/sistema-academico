<div class="form-row">

    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="title">Titulo</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">N</button>
            </span>
            <input
                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                name="title"
                placeholder="Ingrese titulo" type="text"  value="{{ old('title', isset($aviso) ? $aviso->title : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('title')? 'd-block' : '' }}">
            {{ $errors->has('title')? $errors->first('title') : 'El campo de titulo es requerido'  }}
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <input type="file" class="dropify" name="file"  
            data-max-file-size="3M"
            @if(isset($aviso))
            data-default-file="{{ url($aviso->file)}}"
            @endif
        />
    
        <div class="invalid-feedback {{ $errors->has('file')? 'd-block' : '' }}">
            {{ $errors->has('file')? $errors->first('file') : 'El campo de file es requerido'  }}
        </div>
    </div>
    

</div>
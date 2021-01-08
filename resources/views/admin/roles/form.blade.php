<div class="form-row">
    <div class="col-md-4 mx-auto mb-3">
        <label class="col-form-label" for="name">Nombre del rol</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">N</button>
            </span>
            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" 
                name="name"
                placeholder="Ingrese Nombre" type="text"  value="{{ old('name', isset($role) ? $role->name : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('name')? 'd-block' : '' }}">
            {{ $errors->has('name')? $errors->first('name') : 'El campo de Nombre es requerido'  }}
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-4 mx-auto mb-3">
        <label class="col-form-label" for="roles">Permisos</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">P</button>
            </span>
            <select class="select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="permissions[]" multiple="multiple">
                @foreach($permissions as $item)
                    <option value="{{ $item->name }}" {{ (isset($role) && $role->permissions->contains('name', $item->name)) ? 'selected' : '' }}>
                        {{ __("permisions.{$item->name}") }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('permissions')? 'd-block' : '' }}">
            {{ $errors->has('permissions')? $errors->first('permissions') : 'Este campo es requerido'  }}
        </div>
    </div>
</div>
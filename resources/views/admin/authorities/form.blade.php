<div class="form-row">
    <div class="col-md-4">&nbsp;</div>
    <div class="col-md-4 mb-3">
        <label class="col-form-label" for="user">Nombre Autoridad : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">A</button>
            </span>
            <select class="select2" name="user" id="user">
                <option></option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('user', isset($authority) ? $authority->user : '') == $user->id ? 'selected' : '' }}>
                        {{ $user->fullname }}
                    </option>    
                @endforeach
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('user')? 'd-block' : '' }}">
            {{ $errors->has('user')? $errors->first('user') : 'Este campo es requerido'  }}
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-4">&nbsp;</div>
    <div class="col-md-4 mb-3">
        <label class="col-form-label" for="role">Cargo Autoridad : </label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">A</button>
            </span>
            <select class="select2" name="role" id="role">
                <option></option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ old('role', isset($authority) ? $authority->role : '') == $role->id ? 'selected' : '' }}>
                        {{ $role->name}}
                    </option>    
                @endforeach
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('role')? 'd-block' : '' }}">
            {{ $errors->has('role')? $errors->first('role') : 'Este campo es requerido'  }}
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
<div class="form-row">

    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="title">Titulo</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">T</button>
            </span>
            <input
                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                name="title"
                placeholder="Ingrese el title" type="text" value="{{ old('title', isset($announcement) ? $announcement->title : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('title')? 'd-block' : '' }}">
            {{ $errors->has('title')? $errors->first('title') : 'El campo titulo es requerido'  }}
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="gestion">Gestión</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">G</button>
            </span>
            <input
                class="form-control {{ $errors->has('gestion') ? 'is-invalid' : '' }}"
                name="gestion"
                placeholder="Ingrese Gestión" type="text" value="{{ old('gestion', isset($announcement) ? $announcement->gestion : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('gestion')? 'd-block' : '' }}">
            {{ $errors->has('gestion')? $errors->first('gestion') : 'El campo de Gestión es requerido'  }}
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <label class="col-form-label" for="description">Descripcion</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">D</button>
            </span>
            <textarea
                class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                name="description"
                placeholder="Ingrese una descripcion" type="text">{{ old('description', isset($announcement) ? $announcement->description : '') }}</textarea>
        </div>

        <div class="invalid-feedback {{ $errors->has('description')? 'd-block' : '' }}">
            {{ $errors->has('description')? $errors->first('description') : 'El campo de Nombre es requerido'  }}
        </div>
    </div>

    <div class="form-group ex-inputs">
        <label for="start_date_announcement" class="col-form-label">Fecha de publicación(*)</label>
        <div class="form-group row">
            <div class="col-md-6">
                <input
                    type="text"
                    class="form-control ex-inputs-start"
                    name="start_date_announcement"
                    placeholder="Fecha de inicio"
                    value="{{ old('start_date_announcement', isset($announcement) ? date('D M d Y', strtotime($announcement->start_date_announcement)) : '') }}" >

                <div class="invalid-feedback {{ $errors->has('start_date_announcement')? 'd-block' : '' }}">
                    {{ $errors->has('start_date_announcement')? $errors->first('start_date_announcement') : 'El campo de Nombre es requerido'  }}
                </div>
            </div>
            <div class="col-md-6">
                <input
                    type="text"
                    class="form-control ex-inputs-end"
                    name="end_date_announcement"
                    placeholder="Fecha de fin"
                    value="{{ old('end_date_announcement', isset($announcement) ? date('D M d Y', strtotime($announcement->end_date_announcement)) : '') }}" >

                <div class="invalid-feedback {{ $errors->has('end_date_announcement')? 'd-block' : '' }}">
                    {{ $errors->has('end_date_announcement')? $errors->first('end_date_announcement') : 'El campo de Nombre es requerido'  }}
                </div>
            </div>
            <div class="ex-inputs-picker"></div>
        </div>
    </div>

    <div class="form-group ex-inputs-calification">
        <label for="start_date_calification" class="col-form-label">Fecha de calificacion(*)</label>
        <div class="form-group row">
            <div class="col-md-6">
                <input
                    type="text"
                    class="form-control ex-inputs-calification-start"
                    name="start_date_calification"
                    placeholder="Fecha de inicio"
                    value="{{ old('start_date_calification', isset($announcement) ? date('D M d Y', strtotime($announcement->start_date_calification)) : '') }}" >

                <div class="invalid-feedback {{ $errors->has('start_date_calification')? 'd-block' : '' }}">
                    {{ $errors->has('start_date_calification')? $errors->first('start_date_calification') : 'El campo de Nombre es requerido'  }}
                </div>
            </div>

            <div class="col-md-6">
                <input
                        type="text"
                        class="form-control ex-inputs-calification-end"
                        name="end_date_calification"
                        placeholder="Fecha de fin"
                        value="{{ old('end_date_calification', isset($announcement) ? date('D M d Y', strtotime($announcement->end_date_calification)) : '') }}" >

                <div class="invalid-feedback {{ $errors->has('end_date_calification')? 'd-block' : '' }}">
                    {{ $errors->has('end_date_calification')? $errors->first('end_date_calification') : 'El campo de Nombre es requerido'  }}
                </div>
            </div>
            <div class="ex-inputs-calification-picker"></div>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="Academic">Unidades educactivas</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">A</button>
            </span>

            <select class="form-control" name="academic">
                @foreach($academics as $item)
                    <option value="{{ $item->id }}" {{ (isset($announcement) && $item->id == $announcement->academic_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('academics')? 'd-block' : '' }}">
            {{ $errors->has('academics')? $errors->first('academics') : 'Este campo es requerido'  }}
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="item">Items</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">I</button>
            </span>

            <select class="form-control" name="item_id">
                @foreach($items as $item)
                    <option value="{{ $item->id }}" {{ (isset($announcement) && $item->id == $announcement->item_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('item_id')? 'd-block' : '' }}">
            {{ $errors->has('item_id')? $errors->first('item_id') : 'Este campo es requerido'  }}
        </div>
    </div>

</div>

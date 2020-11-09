@forelse($items as $requirement)
    <div class="container d-inline-block mb-2">
        @if (!Auth::user()->hasRole('Postulante'))
            <label class="switch switch-3d switch-primary">
                <input class="switch-input" type="checkbox" name="{{ $requirement->title }}" {{ ($requirement->requirementFile() != null && $requirement->requirementFile()->checked)? 'checked' : '' }}>
                <span class="switch-slider"></span>
            </label>
        @endif
        <span> {{ $requirement->description }}</span>
        <div class="pull-right">

            @php($url = route('admin.requirements.upload', [ 'announcement' => $announcement->id, 'requirement' => $requirement->id ]) )

            @if($requirement->requirementFile() == null)
                <a href="#" id="uploadButton" class="btn btn-outline-success" onclick="show_form(false, '{{ $url }}')">Subir</a>
            @elseif($requirement->requirementFile() != null && $requirement->requirementFile()->checked)
                <b>Aprobado</b>
            @else
                <a href="#" class="btn btn-outline-primary" onclick="show_form({{ $requirement->requirementFile() }}, '{{ $url }}')">Cambiar</a>
                @if(Auth::user()->hasRole(['Calificador']))
                    <a href="{{ asset('storage/'.$requirement->requirementFile()->path) }}" class="btn btn-outline-primary" download>VER</a>
                @endif
            @endif
        </div>
    </div>
@empty
    <p>Vacio</p>
@endforelse
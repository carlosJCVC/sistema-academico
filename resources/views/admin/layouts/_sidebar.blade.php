@if (Auth::user() != null)
<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.dashboard') }}"><i class="icon-speedometer"></i> Escritorio</a>
            </li>

           <li class="nav-title">
                {{ Auth::user()->name }}
            </li> 
            @if(Auth::user()->checkPermissions('or', ['list users', 'list roles']))
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-people"></i> Usuarios</a>
                <ul class="nav-dropdown-items">
                    @can('list users')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.index') }}"><i class="icon-user"></i>Lista</a>
                    </li>
                    @endcan
                    @can('list users')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.create') }}"><i class="icon-user"></i>Agregar Usuario</a>
                    </li>
                    @endcan
                   @can('list roles')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.roles.index') }}"><i class="icon-user-following"></i> Roles</a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endif

           <!--  @if(Auth::user()->checkPermissions('or', ['list announcements', 'create announcements']))
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Convocatorias</a>
                <ul class="nav-dropdown-items">
                    @can('list announcements')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.announcements.index') }}"><i class="icon-chart"></i> Lista</a>
                    </li>
                    @endcan
                    @can('create announcements')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.announcements.create') }}"><i class="icon-chart"></i> Nuevo</a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endif -->

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Horarios</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.schedules.index') }}"><i class="icon-list"></i> Lista</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.schedules.create') }}"><i class="icon-plus"></i> Nuevo</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Ud. Académicas</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.academics.index') }}"><i class="icon-list"></i> Lista</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.academics.create') }}"><i class="icon-plus"></i> Nuevo</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Materias</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.asignatures.index') }}"><i class="icon-list"></i> Lista</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.asignatures.create') }}"><i class="icon-plus"></i> Nuevo</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Grupos</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.asignature-group.index') }}"><i class="icon-list"></i> Lista</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.asignature-group.create') }}"><i class="icon-plus"></i> Nuevo</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-docs"></i> Informes</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-doc"></i> Asistencia y Avance</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.asistencia-avance.index') }}"><i class="icon-list"></i> Lista</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.asistencia-avance.create') }}"><i class="icon-plus"></i> Nuevo</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.asistencia-avance.planillas') }}"><i class="icon-pin"></i> Planillas</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-chart"></i> Nuevo</a>
                    </li> --}}
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Reposiciones</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.classes-reposiciones.index') }}"><i class="icon-list"></i> Lista</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.classes-reposiciones.create') }}"><i class="icon-plus"></i> Nuevo</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Justificaciones</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.absences.index') }}"><i class="icon-list"></i> Lista</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.absences.create') }}"><i class="icon-plus"></i> Nuevo</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Bitacoras</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.bitacoras.index') }}"><i class="icon-book-open"></i> Lista</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.bitacoras.histories') }}"><i class="icon-event"></i> Sessiones</a>
                    </li>
                </ul>
            </li>

            <!-- <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Items</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.items.index') }}"><i class="icon-chart"></i> Lista</a>
                    </li>
                    @can('create items')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.items.create') }}"><i class="icon-chart"></i> Nuevo</a>
                    </li>
                    @endcan
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Avisos</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.avisos.index') }}"><i class="icon-chart"></i> Lista</a>
                    </li>
                    @can('create avisos')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.avisos.create') }}"><i class="icon-chart"></i> Nuevo</a>
                    </li>
                    @endcan
                </ul>
            </li> -->

        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
@endif
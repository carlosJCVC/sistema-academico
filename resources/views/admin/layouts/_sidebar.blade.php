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

            @role('Administrador')
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="icon-drawer"></i>
                    Mensajes 
                    @if ($count = auth()->user()->unreadNotifications()->count())
                        <span class="badge badge-danger" style="float: none">{{ $count }}</span>
                    @endif
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('messages.show', ['read' => true]) }}"><i class="icon-envelope-open"></i>Leidos</a>
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link" href="{{ route('messages.show', ['read' => false]) }}"><i class="icon-uncheck"></i>No Leidos</a> --}}
                        <a class="nav-link" href="{{ route('messages.show', ['read' => false]) }}"><i class="fa fa-envelope-o" aria-hidden="true"></i>No Leidos</a>
                    </li>
                </ul>
            </li>
            @endrole

            @if(Auth::user()->checkPermissions('or', ['list users', 'list roles', 'create users']))
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-people"></i> Usuarios</a>
                <ul class="nav-dropdown-items">
                    @can('list users')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.index') }}"><i class="icon-user"></i>Lista</a>
                    </li>
                    @endcan
                    @can('create users')
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

             @if(Auth::user()->checkPermissions('or', ['list schedules', 'create schedules']))
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Horarios</a>
                <ul class="nav-dropdown-items">
                    @can('list schedules')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.schedules.index') }}"><i class="icon-list"></i> Lista</a>
                    </li>
                    @endcan
                    @can('create schedules')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.schedules.create') }}"><i class="icon-plus"></i> Nuevo</a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endif

            @if(Auth::user()->checkPermissions('or', ['list academics', 'create academics']))
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Ud. Académicas</a>
                <ul class="nav-dropdown-items">
                    @can('list academics')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.academics.index') }}"><i class="icon-list"></i> Lista</a>
                    </li>
                    @endcan
                    @can('create academics')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.academics.create') }}"><i class="icon-plus"></i> Nuevo</a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endif

            @if(Auth::user()->checkPermissions('or', ['list asignatures', 'create asignatures']))
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Materias</a>
                <ul class="nav-dropdown-items">
                    @can('list asignatures')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.asignatures.index') }}"><i class="icon-list"></i> Lista</a>
                    </li>
                    @endcan
                    @can('create asignatures')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.asignatures.create') }}"><i class="icon-plus"></i> Nuevo</a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endif

            @if(Auth::user()->checkPermissions('or', ['list groups', 'create groups']))
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Grupos</a>
                <ul class="nav-dropdown-items">
                    @can('list groups')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.asignature-group.index') }}"><i class="icon-list"></i> Lista</a>
                    </li>
                    @endcan
                    @can('create groups')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.asignature-group.create') }}"><i class="icon-plus"></i> Nuevo</a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endif

            @if(Auth::user()->checkPermissions('or', ['list week reports', 'create week reports', 'list reports planillas']))
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-docs"></i> Informes</a>
                <ul class="nav-dropdown-items">
                    @if(Auth::user()->checkPermissions('or', ['list week reports', 'create week reports']))
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-doc"></i> Asistencia y Avance</a>
                        <ul class="nav-dropdown-items">
                            @can('list week reports')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.asistencia-avance.index') }}"><i class="icon-list"></i> Lista</a>
                            </li>
                            @endcan
                            @can('create week reports')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.asistencia-avance.create') }}"><i class="icon-plus"></i> Nuevo</a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endif
                    @can('list reports planillas')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.asistencia-avance.planillas') }}"><i class="icon-pin"></i> Planillas</a>
                    </li>
                    @endcan
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-chart"></i> Nuevo</a>
                    </li> --}}
                </ul>
            </li>
            @endif

            @if(Auth::user()->checkPermissions('or', ['list classroom', 'create classroom']))
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Reposiciones</a>
                <ul class="nav-dropdown-items">
                    @can('list classroom')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.classes-reposiciones.index') }}"><i class="icon-list"></i> Lista</a>
                    </li>
                    @endcan
                    @can('create classroom')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.classes-reposiciones.create') }}"><i class="icon-plus"></i> Nuevo</a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endif

            @if(Auth::user()->checkPermissions('or', ['list absences', 'create absences']))
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Justificaciones</a>
                <ul class="nav-dropdown-items">
                    @can('list absences')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.absences.index') }}"><i class="icon-list"></i> Lista</a>
                    </li>
                    @endcan
                    @can('create absences')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.absences.create') }}"><i class="icon-plus"></i> Nuevo</a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endif

            @can('list bitacoras')
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
            @endcan

            @can('list backups')
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-eye"></i> Seguridad</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.backup.backups') }}"><i class="icon-key"></i> Backups</a>
                    </li>
                </ul>
            </li>
            @endcan

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
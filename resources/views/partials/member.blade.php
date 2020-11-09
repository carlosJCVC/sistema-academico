<div class="member">
    <div class="media">
        <a class="pull-left" href="{{ route('postulans.create', $announcement->id) }}">
            <img class="media-object" src="{{ asset('assets/images/work.png') }}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">
                {{ $announcement->title }}
            </h4>
            <p>{{ $announcement->created_at }}</p>
            <span class="divider"></span>
            <p>{{ $announcement->description }}</p>
            <div class="pull-right">
                <a href="{{ route('home.announcements.show', [ 'announcement' => $announcement->id ]) }}" class="text-white">Ver Convocatoria</a>
            </div>
        </div>
    </div>
</div>
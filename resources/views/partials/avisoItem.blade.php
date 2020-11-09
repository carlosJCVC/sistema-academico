<div class="member">
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="{{ asset('assets/images/anoun.png') }}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">
                {{ $item->title }}
            </h4>
            <p>{{ $aviso->readHumansDate() }}</p>
            <span class="divider"></span>
            <a href="{{ route('avisos.download', ['aviso' => $item->id]) }}"> Click para ver</a>
        </div>
    </div>
</div>
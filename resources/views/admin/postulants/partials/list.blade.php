@forelse ($items as $item)
    <div class="container d-inline-block mb-2">

        <span><b>{{ $item->title }}</b></span>
        <span class="pull-right"><b>{{ $item->percentage*100 }} %</b></span>
        <span class="d-block pl-4">{{ $item->description }}</span>
        <hr style="border-top: 1px solid blue">

        @php
            $subitems = ($type == 'rating')? $item->subratings : $item->subcalifications;
        @endphp

        @forelse ($subitems as $subitem)
            <ol type="a">
                <li>
                    {{ $subitem->description }}
                    <div class="pull-right">

                        <form action="{{ route('admin.results.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="input-group mb-3">
                                <input type="text" hidden name="postulant" value="{{$postulant->id}}">
                                <input type="text" hidden name="item" value="{{$item->id}}">
                                <input type="text" hidden name="subitem" value="{{$subitem->id}}">
                                <input type="text" hidden name="announcement" value="{{$announcement->id}}">
                                <input type="text" hidden name="type" value="{{$type}}">

                                <div class="input-group-prepend">
                                    <a href="javascript:void(0)" class="btn btn-outline-secondary">
                                        {{ $subitem->percentage*100 }}%
                                    </a>
                                </div>
                                <input type="text" name="score" class="form-control input-sm" placeholder="Ingrese Nota" value="{{ $subitem->score($item, $postulant, $announcement, $type) }}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary text-primary">
                                        <i class="fa fa-save"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </li>
                <br>
            </ol>
        @empty
            <span class="badge badge-warning">Empty</span>
        @endforelse

    </div> 
@empty
    <span class="badge badge-warning">Empty</span>
@endforelse
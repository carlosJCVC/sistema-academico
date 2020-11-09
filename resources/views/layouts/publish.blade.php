<div class="card border-primary text-white mb-3" style="background: rgba(0,0,0,0.8) !important">
    <div class="card-header border-primary text-center"><b>{{ $item->title }}</b></div>
    {{-- <img src="{{ asset('assets/images/adinfondo.jpg') }}" class="card-img-top" alt="..."> --}}
    <div class="card-body" style="position: relative">
        <h5 class="card-title text-white">DESCRIPCION</h5>
        <p class="card-text text-white font-weight-bold">{{ $item->description }}</p>
        <small class="text-muted" style="color: white !important; position: absolute; bottom: 0; right: 10px">Last updated 3 mins ago</small>
    </div>
    <div class="card-footer bg-transparent border-primary">
        <a href="{{ route('home.download', ['publish' => $item->id]) }}" class="btn btn-outline-primary btn-block"><b>Ver notas</b></a>
    </div>
</div>

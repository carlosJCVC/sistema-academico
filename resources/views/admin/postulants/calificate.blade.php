@extends('admin.layouts.app')

@section('htmlheader_title')
   Postulants
@endsection

@section('styles')

@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Calificar Postulante - {{ $postulant->lastname }} {{ $postulant->name }}
        </div>
        <div class="card-body" style="height: 100vh">

            <div class="card-header text-center title-panel bg-dark">PANEL DE CALIFICACION</div>
            <div class="card-body" style="background-image: url('{{ asset('images/adinfondo.jpg') }}'); background-size: cover; background-repeat: no-repeat">
                
                <nav class="nav nav-pills flex-column flex-sm-row">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @can('calificate merits postulants')
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">MERITOS</a>
                        @endcan
                        @can('calificate rating postulants')
                        <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">CONOCIMIENTOS</a>
                        @endcan
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    @can('calificate merits postulants')
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    
                        <div class="card">
                            @include('admin.postulants.partials.list', [ 'items' => $califications, 'type' => 'calification'  ])

                            <h2>
                                <div class="text-center">Nota :: {{$scoresCalifications}}%</div>
                            </h2>
                        </div>
                    </div>
                    @endcan

                    @can('calificate rating postulants')
                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                        <div class="card">
                            @include('admin.postulants.partials.list', [ 'items' => $ratings, 'type' => 'rating' ])

                            <h2>
                                <div class="text-center">Nota :: {{$scoresRatings}}%</div>
                            </h2>
                        </div>
                    </div>
                    @endcan
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
<script>
    const addScore = (e) => {
        let data = e.target.dataset;
        console.log(e)
  
        $.ajax({
            method: "POST",
            url: "{{ route('admin.results.store') }}",
            data: { 
                postulant: data.postulantId, 
                rating: ratingId, 
                announcement: data.announcementId, 
                type: type
            }
        }).done(function( msg ) {
                alert( "Data Saved: " + msg );
        });
    }
</script>
@endsection
@extends('admin.layouts.app')

@section('htmlheader_title')
    Requirements
@endsection

@section('content')
    <div class="card" style="height: 100vh">
        <div class="card-header text-center title-panel">Archivos - {{ $postulant->name . ' ' . $postulant->lastname }}</div>
        <div class="card-body" style="background-image: url('{{ asset('images/adinfondo.jpg') }}'); background-size: cover; background-repeat: no-repeat">
            <div class="row">
                <div class="col-3">
                    <div class="card border-info shadow_card special-card">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">REQUISITOS INDISPENSABLES</a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">REQUISITOS GENERALES</a>
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">CONSULTAS</a>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                @include('admin.postulants.partials.list', [ 'postulant' => $postulant, 'items' => $announcement->requiredRequirements() ])
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                @include('admin.postulants.partials.list', [ 'postulant' => $postulant, 'items' => $announcement->generalRequirements() ])
                            </div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                CHAT
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const checkedFile = (announcement_id, user_id, requirement_id) => {
            var url = '{{ route("admin.postulants.checkedFile", [ "announcement" => ":announcement_id", "postulant" => ":user_id", "requirement" => ":requirement_id" ] ) }}'

            url = url.replace(':user_id', user_id)
            url = url.replace(':requirement_id', requirement_id)
            url = url.replace(':announcement_id', announcement_id)

            fetch(url, {
                method: 'GET',
                //body: new URLSearchParams({code: text}),
                headers: new Headers({
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }),
            }).then(async response => {
                if (!response.ok) {
                    throw new Error(response.statusText)
                }

                let res = await response.json()

                if (res.code == 200)
                    toastr.success(res.message)
            })


        }
    </script>
@endsection
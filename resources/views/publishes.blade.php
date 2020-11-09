@extends('layouts.app')

@section('content')
    <div class="animated fadeIn">

            <div class="card-header text-center title-panel bg-dark text-white mb-3" style="font-family: cursive !important; font-size: 2em; background: rgba(0,0,0,0.8) !important">
                Notas de convocatorias publicadas
            </div>
            <div class="card-columns">
    
                @foreach($publishes as $publish)
                    @include('layouts.publish', [ 'item' => $publish ])
                @endforeach
    
            </div>

    </div>
@endsection

@section('scripts')
    <script>
        let title = $("#announcement_id")
        let content = $("#announcement_content")
        let list_requirements = $("#list_requirements_required")
        let list_extra = $("#list_requirements")
        let anouncement_modal = $("#announcement")
        let anouncement_id = $("#id_announcement")

        const show_announcement = (announcement, requeriments) => {
            clear()
            requeriments.forEach(item => {
                if (item.required == true)
                    list_requirements.append('<li><b>' + item.description + '</b></li>')
                else
                    list_extra.append('<li><b>' + item.description + '</b></li>')
            })

            title.html("<b class='text-center'>" + announcement.title + "</b>")
            content.html("<b class='text-center'>" + announcement.description + "</b>")
            list_requirements.html()

            anouncement_id.val(announcement.id)

            anouncement_modal.modal()
        };

        const clear = () => {
            title.html('')
            content.html('')
            list_requirements.html('')
            list_extra.html('')
        }

        const insertCode = (e) => {
            anouncement_modal.modal('hide')

            Swal.fire({
                title: 'Postulate',
                html: `<h2 style='font-family: cursive'><strong>Ingrese codigo de postulacion</strong></2>.`,
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Entrar',
                showLoaderOnConfirm: true,
                preConfirm: (text) => {
                    // TODO cambiar la ur cuando se pone en produccion
                    return fetch(`http://localhost:8000/admin/announcements/${anouncement_id.val()}/compare`, {
                        method: 'POST',
                        body: new URLSearchParams({code: text}),
                        headers: new Headers({
                            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }),
                    }).then(response => {
                        console.log('response')
                        if (!response.ok) {
                            throw new Error(response.statusText)
                        }
                        return response.json()
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then(({ value }) => {
                const { error, code } = value

                if ( code == 400) {
                    toastr.error(error)
                }

                if ( code == 200 ) {
                    location.replace('{{ route('admin.announcements.index') }}')
                    toastr.success('codigo correcto')
                }
            })

        }
    </script>
@endsection
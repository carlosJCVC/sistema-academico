@extends('admin.layouts.app')

@section('htmlheader_title')
    Mensajes
@endsection


@section('content')

    <div class="card mt-3">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Mensajes
        </div>
        <div class="card-body">
            <ul class="list-unstyled">
                @foreach ($messages as $message)
                    <li class="media mb-3">
                        <img src="{{ asset('/user.svg') }}" class="mr-3 rounded-circle" alt="..." style="height: 55px">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">{{ $message->message->name}}</h5>
                            <b>Contacto:</b><a href="mailto:{{ $message->message->email }}">Direccion de correo</a><br>
                            <b>Mensaje:</b>{{ $message->message->body }}
                        </div>
                        @unless ($message->isReaded)
                            <form action="{{ route('message.markAsRead', $message->notificable_id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <button title="Marcar como mensaje leido">x</button>
                            </form>
                        @endunless
                    </li>
                    <hr>
                @endforeach
            </ul>
        </div>
    </div>

@endsection

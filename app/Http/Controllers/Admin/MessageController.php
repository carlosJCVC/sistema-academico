<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Notifications\SendMessageToAdmins;
use App\User;
use Illuminate\Notifications\DatabaseNotification;
use stdClass;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'body' => 'required|string|max:255',
        ]);

        $message = Message::create($request->all());

        // send message to users with admin role
        $users = User::all();
        $admins = $users->filter(function ($user, $key) {
            return $user->hasRole('Administrador');
        });

        $admins->each(function ($admin) use ($message) {
            $admin->notify(new SendMessageToAdmins($message));
        });

        return back();
    }

    public function show(Request $request)
    {
        $get_messages_readed = $request->get('read');
        $notifications = collect([]);

        if ($get_messages_readed) {
            $notifications = auth()->user()->readNotifications;
        } else {
            $notifications = auth()->user()->unreadNotifications;
        }

        $messages = $notifications->map(function ($notification) use ($get_messages_readed) {
            $record =  new stdClass();
            $record->notificable_id = $notification->id;
            $record->message = Message::find($notification->data['body']);
            // mejorar esto porque de entrada se sabe si son notificaciones leidas o no,pero por cuestion tiempo agregare a cada
            // notificacion aka, una variable bandera 
            $record->isReaded = $get_messages_readed;
            return $record;
        });

        return view('admin.messages.show', compact('messages'));
    }

    public function markAsRead($id)
    {
        DatabaseNotification::find($id)->markAsRead();
        return back();
    }
}

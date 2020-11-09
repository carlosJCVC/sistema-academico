<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Announcement;
use App\Models\Event;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Announcement $announcement)
    {
        return view('admin.announcements.events.create', [ 'announcement' => $announcement ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request, Announcement $announcement)
    {
        $input = $request->all();
        $input['announcement_id'] = $announcement->id;

        $event = new Event($input);
        $event->save();

        return redirect(route('admin.data.index', $announcement->id))->with([ 'message' => 'Evento creado exitosamente!', 'alert-type' => 'success' ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement, Event $event)
    {
        return View('admin.announcements.events.edit', [ 'announcement' => $announcement, 'event' => $event ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, Announcement $announcement, Event $event)
    {
        $input = $request->all();

        $event->update($input);
        $event->save();

        return redirect(route('admin.data.index', $announcement->id))->with([ 'message' => 'Event actuaizado exitosamente!', 'alert-type' => 'success' ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement, Event $event)
    {
        $event->delete();

        return redirect(route('admin.data.index', $announcement->id))->with([ 'message' => 'Evento eliminado exitosamente!', 'alert-type' => 'error' ]);
    }
}

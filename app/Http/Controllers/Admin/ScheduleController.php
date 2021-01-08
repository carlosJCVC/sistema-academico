<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleRequest;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all();

        return view('admin.schedules.index', ['schedules' => $schedules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $option_schedules = config('schedule-asignature.hours');
        return view('admin.schedules.create', [
            'schedules' => $option_schedules
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleRequest $request)
    {
        $input = $request->all();

        $schedule = new Schedule($input);
        $schedule->save();

        return redirect(route('admin.schedules.index', ['schedule' => $schedule]))->with(['message' => 'Horario creado exitosamente!', 'alert-type' => 'success']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        $option_schedules = config('schedule-asignature.hours');
        return view('admin.schedules.edit', ['schedule' => $schedule, 'schedules' => $option_schedules]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleRequest $request, Schedule $schedule)
    {
        $input = $request->all();

        $schedule->update($input);

        return redirect()->route('admin.schedules.index', ['schedule' => $schedule])->with(['message' => 'Horario actualizado exitosamente!', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('admin.schedules.index', ['schedule' => $schedule])->with(['message' => 'Horario eliminado exitosamente!', 'alert-type' => 'success']);
    }
}

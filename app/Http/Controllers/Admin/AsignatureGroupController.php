<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AsignatureGroupRequest;
use App\Models\Asignature;
use App\Models\AsignatureGroup;
use App\Models\AsignatureGroupTeacher;
use App\Models\Schedule;
use App\User;

class AsignatureGroupController extends Controller
{
    public function index()
    {
        $groups = AsignatureGroup::all();
        $groups->load('asignature');
        return view('admin.asignature-groups.index', [
            'groups' => $groups
        ]);
    }

    public function create()
    {
        $asignatures = Asignature::all();
        $users = User::all();
        $users->load('roles');

        $teachers = $users->filter(function ($user, $key) {
            return $user->hasRole('Docente');
        });

        $auxiliares = $users->filter(function ($user, $key) {
            return $user->hasRole('Auxiliar');
        });

        $schedules = Schedule::all();

        return view(
            'admin.asignature-groups.create',
            [
                'asignatures' => $asignatures,
                'teachers' => $teachers,
                'auxiliares' => $auxiliares,
                'schedules' => $schedules
            ]
        );
    }

    public function store(AsignatureGroupRequest $request)
    {
        $input = $request->all();

        $group = new AsignatureGroup([
            'group' => $input['group'],
            'asignature_id' => $input['asignature']
        ]);

        // basicamente filtra si auxiliar esta presente 
        // cuando los campos key y schedule no este null y tenga minimo 1 item respectivamente
        // devuelve una collection
        $valid_schedules_with_teachers = collect($input['teachers'])->filter(function ($teacher) {
            if ($teacher['key'] && $teacher['schedules']) {
                return $teacher;
            }
        });

        $group_schedules = collect([]);
        foreach ($valid_schedules_with_teachers->toArray() as $data) {
            $schedules = $data['schedules'];

            foreach ($schedules as $schedule) {
                $group_schedules->push(new AsignatureGroupTeacher([
                    'teacher' => $data['key'],
                    'titular' => $data['titular'],
                    'schedule' => $schedule,
                ]));
            }
        }

        try {
            $group->save();
            $group->refresh();
            $group_schedules->map(function ($teacher) use ($group) {
                $group->teachers()->save($teacher);
            });
        } catch (\Exception $e) {
            dump($e->getMessage());
            dd('...');
            return back();
            // still check 
        }

        return redirect(route('admin.asignature-group.index'))
            ->with(['message' => 'Grupo de Materia creada exitosamente!', 'alert-type' => 'success']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $asignatureGroup = AsignatureGroup::findOrFail($id);
        $asignatures = Asignature::all();
        $users = User::all();
        $users->load('roles');

        $teachers = $users->filter(function ($user, $key) {
            return $user->hasRole('Docente');
        });

        $auxiliares = $users->filter(function ($user, $key) {
            return $user->hasRole('Auxiliar');
        });

        $schedules = Schedule::all();

        return view('admin.asignature-groups.edit', [
            'group' => $asignatureGroup,
            'asignatures' => $asignatures,
            'teachers' => $teachers,
            'auxiliares' => $auxiliares,
            'schedules' => $schedules
        ]);
    }

    public function update(AsignatureGroupRequest $request, $id)
    {
        $input = $request->all();
        $ag = AsignatureGroup::find($id);
        $ag->teachers()->delete(); // clear child models
        $ag->update($input);

        $valid_schedules_with_teachers = collect($input['teachers'])->filter(function ($teacher) {
            if ($teacher['key'] && $teacher['schedules']) {
                return $teacher;
            }
        });

        $group_schedules = collect([]);
        foreach ($valid_schedules_with_teachers->toArray() as $data) {
            $schedules = $data['schedules'];

            foreach ($schedules as $schedule) {
                $group_schedules->push(new AsignatureGroupTeacher([
                    'teacher' => $data['key'],
                    'titular' => $data['titular'],
                    'schedule' => $schedule,
                ]));
            }
        }

        try {
            $group_schedules->map(function ($teacher) use ($ag) {
                $ag->teachers()->save($teacher);
            });
        } catch (\Exception $e) {
            dump($e->getMessage());
            dd('...');
            return back();
        }

        return redirect()
            ->route('admin.asignature-group.index')
            ->with(['message' => 'Grupo de Materia actualizado exitosamente!', 'alert-type' => 'success']);
    }

    public function destroy($id)
    {
        AsignatureGroup::destroy($id);
        return redirect()
            ->route('admin.asignature-group.index')
            ->with(['message' => 'Grupo de Materia eliminado exitosamente!', 'alert-type' => 'success']);
    }
}

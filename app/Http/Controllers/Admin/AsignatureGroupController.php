<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AsignatureGroupRequest;
use App\Models\Asignature;
use App\Models\AsignatureGroup;
use App\Models\AsignatureGroupTeacher;
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
        $teachers = User::all();
        $auxiliares = User::all();
        return view('admin.asignature-groups.create', 
            [
                'asignatures' => $asignatures,
                'teachers' => $teachers,
                'auxiliares' => $auxiliares
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

        $teachersOfGroup = collect($input['teachers'])->map(function ($teacher) {
            $groupTeacher = new AsignatureGroupTeacher([
                'teacher' => $teacher['key'],
                'from' => $teacher['from'],
                'to' => $teacher['to'],
                'day' => $teacher['day'],
                'titular' => $teacher['titular']
            ]);
            return $groupTeacher;
        });

        try {
            $group->save();
            $group->refresh();
            $teachersOfGroup->map(function($teacher) use($group) {
                $group->teachers()->save($teacher);
            });
        } catch (\Exception $e) {
            dump($e->getMessage());
            dd('...');
            return back();
            // still check 
        }

        return redirect(route('admin.asignature-group.index'))
        ->with([ 'message' => 'Grupo de Materia creada exitosamente!', 'alert-type' => 'success' ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $asignatureGroup = AsignatureGroup::findOrFail($id);
        
        $asignatures = Asignature::all();
        $teachers = User::all();
        $auxiliares = User::all();
        
        return view('admin.asignature-groups.edit', [
            'group' => $asignatureGroup,
            'asignatures' => $asignatures,
            'teachers' => $teachers,
            'auxiliares' => $auxiliares
        ]);
    }

    public function update(AsignatureGroupRequest $request, $id)
    {
        $input = $request->all();
        $ag = AsignatureGroup::find($id);
        $ag->teachers()->delete(); // clear child models
        $ag->update($input);
        
        $teachersOfGroup = collect($input['teachers'])->map(function ($teacher) {
            $groupTeacher = new AsignatureGroupTeacher([
                'teacher' => $teacher['key'],
                'from' => $teacher['from'],
                'to' => $teacher['to'],
                'day' => $teacher['day'],
                'titular' => $teacher['titular']
            ]);
            return $groupTeacher;
        });

        try {
            $teachersOfGroup->map(function($teacher) use($ag) {
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

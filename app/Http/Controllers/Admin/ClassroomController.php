<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequest;
use App\Models\Asignature;
use App\Models\Classroom;
use App\User;

class ClassroomController extends Controller
{
    public function index()
    {
        $classes = Classroom::all();
        return view('admin.classroom.index', [
            'classes' => $classes
        ]);
    }

    public function create()
    {
        $users = User::all();
        $asignatures = Asignature::all();
        return view('admin.classroom.create', [
            'users' => $users,
            'asignatures' => $asignatures,
        ]);
    }

    public function store(ClassroomRequest $request)
    {
        $input = $request->all();
        $classe = new Classroom($input);
        $classe->save();
        return redirect(route('admin.classes-reposiciones.index'))
            ->with(['message' => 'Clase de reposicion creada exitosamente!', 'alert-type' => 'success']);
    }

    public function edit($id)
    {
        $classe = Classroom::findOrFail($id);
        $users = User::all();
        $asignatures = Asignature::all();
        return view('admin.classroom.edit', [
            'classe' => $classe,
            'users' => $users,
            'asignatures' => $asignatures,
        ]);
    }

    public function update(ClassroomRequest $request, $id)
    {
        $input = $request->all();
        $classe = Classroom::findOrFail($id);
        $classe->update($input);

        return redirect()
            ->route('admin.classes-reposiciones.index')
            ->with(['message' => 'Clase de reposicion actualizado exitosamente!', 'alert-type' => 'success']);
    }

    public function destroy($id)
    {
        $classe = Classroom::findOrFail($id);
        $classe->delete();
        // 
        return redirect()
            ->route('admin.classes-reposiciones.index')
            ->with(['message' => 'Clase de reposicion eliminado exitosamente!', 'alert-type' => 'success']);
    }
}

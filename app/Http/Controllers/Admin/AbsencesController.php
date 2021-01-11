<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AbsenceRequest;
use App\Models\Absence;
use App\User;

class AbsencesController extends Controller
{
    public function index()
    {
        // $absences = Absence::all();
        $absences = Absence::allRecords();
        dd($absences);
        return view('admin.absences.index', [
            'absences' => $absences
        ]);
    }

    public function create()
    {
        $users = User::all();
        return view('admin.absences.create', [
            'users' => $users,
        ]);
    }

    public function store(AbsenceRequest $request)
    {
        $input = $request->all();
        $absence = new Absence($input);
        $absence->save();
        return redirect(route('admin.absences.index'))
            ->with(['message' => 'Justificacion creada exitosamente!', 'alert-type' => 'success']);
    }

    public function edit($id)
    {
        $users = User::all();
        $absence = Absence::findOrFail($id);
        return view('admin.absences.edit', [
            'absence' => $absence,
            'users' => $users,
        ]);
    }

    public function update(AbsenceRequest $request, $id)
    {
        $input = $request->all();
        $absence = Absence::findOrFail($id);
        $absence->update($input);

        return redirect()
            ->route('admin.absences.index')
            ->with(['message' => 'Justificacion actualizado exitosamente!', 'alert-type' => 'success']);
    }

    public function destroy($id)
    {
        $absence = Absence::findOrFail($id);
        $absence->delete();
        // 
        return redirect()
            ->route('admin.absences.index')
            ->with(['message' => 'Justificacion eliminado exitosamente!', 'alert-type' => 'success']);
    }
}

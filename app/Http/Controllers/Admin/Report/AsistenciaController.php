<?php

namespace App\Http\Controllers\Admin\Report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Reports\AsistenciaRequest;
use App\Models\Asignature;
use App\Models\AsignatureGroup;
use App\Models\WeekReport;
use App\User;

class AsistenciaController extends Controller
{
    public function index()
    {
        $reports = WeekReport::all();
        return view('admin.reports.asistencia_avance.index', [
            'reports' => $reports
        ]);
    }

    public function create()
    {
        $users = User::all();
        $asignatures = Asignature::all();
        $groups = AsignatureGroup::all();
        return view(
            'admin.reports.asistencia_avance.create',
            [
                'users' => $users,
                'asignatures' => $asignatures,
                'groups' => $groups
            ]
        );
    }

    public function preData(Request $request)
    {
        $user = User::findOrFail($request->user);
        $academic_info = $user->getAsignaturesAndGroups();
        $academic_info['self'] = $user->makeHidden(['created_at', 'updated_at', ''])->toArray();
        return $academic_info;
    }

    public function store(AsistenciaRequest $request)
    {
        $input = $request->all();
        $report = new WeekReport($input);

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $report->file_path = $request->file('file')->store('documents', 'public');
            $report->filename  = $request->file->getClientOriginalName();
            $report->has_file  = true;
        }

        $report->save();
        return redirect(route('admin.asistencia-avance.index'))
            ->with(['message' => 'Reporte creado exitosamente!', 'alert-type' => 'success']);
    }

    public function edit($id)
    {
        $report = WeekReport::findOrFail($id);
        $users = User::all();
        $asignatures = Asignature::all();
        $groups = AsignatureGroup::all();
        return view('admin.reports.asistencia_avance.edit', [
            'report' => $report,
            'users' => $users,
            'asignatures' => $asignatures,
            'groups' => $groups
        ]);
    }

    public function update(AsistenciaRequest $request, $id)
    {
        $input = $request->all();
        $report = WeekReport::findOrFail($id);
        $report->fill($input);

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $report->file_path = $request->file('file')->store('documents', 'public');
            $report->filename  = $request->file->getClientOriginalName();
            $report->has_file  = true;
        }

        $report->save();
        return redirect()
            ->route('admin.asistencia-avance.index')
            ->with(['message' => 'Reporte actualizado exitosamente!', 'alert-type' => 'success']);
    }

    public function destroy($id)
    {
        $report = WeekReport::findOrFail($id);

        if ($report->has_file) {
            $report->removeInstanceFile();
        }

        $report->delete();
        return redirect()
            ->route('admin.asistencia-avance.index')
            ->with(['message' => 'Reporte eliminado exitosamente!', 'alert-type' => 'success']);
    }
}

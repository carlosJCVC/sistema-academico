<?php

namespace App\Http\Controllers\Admin\PDF;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WeekReport;
use PDF;
use App\User;
use Carbon\Carbon;
use App\Models\Asignature;
use App\Models\Classroom;
use App\Models\Absence;

class PrintController extends Controller
{
    public function users()
    {
        $users = User::all();
        $users->load('roles');
        $title = "Reporte lista de Usuarios";
        $pdf = PDF::loadView('admin.printers.users', compact('users', 'title'));
        return $pdf->stream('usuarios.pdf');
    }

    public function weekReports()
    {
        // $reports = WeekReport::all();
        $reports = WeekReport::allRecords();
        $title = "Reporte lista de Avances";
        $pdf = PDF::loadView('admin.printers.week-reports', compact('reports', 'title'));
        return $pdf->stream('week_reports.pdf');
    }

    public function planillas(Request $request)
    {
        $user = $request->get('user');
        $year = $request->get('year');
        $number = $request->get('number');
        $from = Carbon::parse($request->get('from'));
        $to = Carbon::parse($request->get('to'));

        $asignaturesFromGestion = Asignature::where('year', $year)->where('number', $number)->pluck('id')->toArray();
        $reports = WeekReport::whereIn('asignature', $asignaturesFromGestion)
            ->where('user', $user)
            ->whereBetween('date', [$from, $to])->get();

        $teacher = User::findOrFail($user);

        $title = "Reporte PLANILLA - Asistencia y Avance";

        $pdf = PDF::loadView('admin.printers.planillas', [
            'title' => $title,
            'reports' => $reports,
            'teacher' => $teacher,
            'gestion' => "{$number} {$year}",
            'rango' => "DE: {$from->format('d/m/y')} A: {$to->format('d/m/y')}",
        ]);
        return $pdf->stream('planillas.pdf');
    }

    public function classrooms()
    {
        $title = "Reporte Clases de reposicion";

        // $classes = Classroom::all();
        $classes = Classroom::allRecords();

        $pdf = PDF::loadView('admin.printers.classrooms', [
            'title' => $title,
            'classes' => $classes,
        ]);
        return $pdf->stream('reposiciones.pdf');
    }

    public function absences()
    {
        $title = "Reporte Justificaciones de ausencia";
        // $absences = Absence::all();
        $absences = Absence::allRecords();
        $pdf = PDF::loadView('admin.printers.absences', [
            'title' => $title,
            'absences' => $absences
        ]);
        return $pdf->stream('planillas.pdf');
    }
}

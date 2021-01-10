<?php

namespace App\Http\Controllers\Admin\Report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Reports\PlanillaRequest;
use App\Models\Asignature;
use App\Models\WeekReport;
use App\User;
use Carbon\Carbon;
use stdClass;

class PlanillaController extends Controller
{
    public function preview()
    {
        session()->forget('planilla');
        $users = User::all();
        return view('admin.reports.planillas.preview', [
            'users' => $users,
        ]);
    }

    public function previewPost(PlanillaRequest $request)
    {
        session()->put('planilla', $request->all());
        return redirect()->route('admin.asistencia-avance.planillas.index');
    }

    public function show()
    {
        if (!session()->has('planilla')) {
            return redirect()->route('admin.asistencia-avance.planillas');
        }
        $request = session()->pull('planilla');
        $user = $request['user'];
        $year = $request['year'];
        $number = $request['number'];
        $from = Carbon::parse($request['from']);
        $to = Carbon::parse($request['to']);

        $asignaturesFromGestion = Asignature::where('year', $year)->where('number', $number)->pluck('id')->toArray();
        $reports = WeekReport::whereIn('asignature', $asignaturesFromGestion)
            ->where('user', $user)
            ->whereBetween('date', [$from, $to])->get();

        $teacher = User::findOrFail($user);

        // For print report in PDF
        $metadata = new stdClass();
        $metadata->user = $user;
        $metadata->year = $year;
        $metadata->number = $number;
        $metadata->from = $request['from'];
        $metadata->to = $request['to'];

        return view('admin.reports.planillas.show', [
            'reports' => $reports,
            'teacher' => $teacher,
            'gestion' => "{$number} {$year}",
            'rango' => "DE: {$from->format('d/m/y')} A: {$to->format('d/m/y')}",
            'metadata' => $metadata
        ]);
    }
}

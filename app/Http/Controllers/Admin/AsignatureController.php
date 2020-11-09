<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AsignatureRequest;
use App\Models\Asignature;

class AsignatureController extends Controller
{
    public function index()
    {
        $asignatures = Asignature::all();
        return view('admin.asignatures.index', [
            'asignatures' => $asignatures
        ]);
    }

    public function create()
    {
        return view('admin.asignatures.create');
    }

    public function store(AsignatureRequest $request)
    {
        $input = $request->all();
        $asignature = new Asignature($input);
        $asignature->save();
        return redirect(route('admin.asignatures.index', [ 'asignature' => $asignature ]))
        ->with([ 'message' => 'Materia creada exitosamente!', 'alert-type' => 'success' ]);
    }

    public function show(Asignature $asignature)
    {
        //
    }

    public function edit(Asignature $asignature)
    {
        return view('admin.asignatures.edit', [ 'asignature' => $asignature ]);
    }

    public function update(AsignatureRequest $request, Asignature $asignature)
    {
        $input = $request->all();

        $asignature->update($input);

        return redirect()
        ->route('admin.asignatures.index', [ 'asignature' => $asignature ])
        ->with(['message' => 'Materia actualizado exitosamente!', 'alert-type' => 'success']);
    }

    public function destroy(Asignature $asignature)
    {
        $asignature->delete();
        // 
        return redirect()
        ->route('admin.asignatures.index', [ 'asignature' => $asignature ])
        ->with(['message' => 'Materia eliminado exitosamente!', 'alert-type' => 'success']);
    }
}

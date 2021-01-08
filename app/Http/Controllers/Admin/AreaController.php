<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use App\Models\Academic;
use App\Http\Requests\AreaRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Academic $academic)
    {
        $areas = DB::table('areas')->where('academic_id', $academic->id)->get();

        return view('admin.areas.index', ['areas' => $areas, 'academic' => $academic]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Academic $academic)
    {
        return view('admin.areas.create', ['academic' => $academic]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $request, Academic $academic)
    {
        $input = $request->all();
        $input['slug'] = ucfirst($request->name);
        $input['academic_id'] = $academic->id;

        $area = new Area($input);
        $area->save();

        return redirect(route('admin.areas.index', ['academic' => $academic]))->with(['message' => 'Carrera creada exitosamente!', 'alert-type' => 'success']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Academic $academic, Area $area)
    {
        return view('admin.areas.edit', ['academic' => $academic, 'area' => $area]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $request, Academic $academic, Area $area)
    {
        $input = $request->all();

        $area->update($input);

        return redirect()->route('admin.areas.index', ['academic' => $academic])->with(['message' => 'Carrera actualizada exitosamente!', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Academic $academic, Area $area)
    {
        $area->delete();

        return redirect()->route('admin.areas.index', ['academic' => $academic])->with(['message' => 'Carrera eliminada exitosamente!', 'alert-type' => 'success']);
    }
}

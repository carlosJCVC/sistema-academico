<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubareaRequest;
use App\Area;
use App\Models\Subarea;
use DB;

class SubareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Area $area)
    {
        $subareas = DB::table('subareas')->where('area_id', $area->id)->get();

        return view('admin.subareas.index', ['area' => $area, 'subareas' => $subareas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Area $area)
    {
        return view('admin.subareas.create', ['area' => $area]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubareaRequest $request, Area $area)
    {
        $input = $request->all();
        $input['slug'] = ucfirst($request->name);
        $input['area_id'] = $area->id;

        $subarea = new Subarea($input);
        $subarea->save();

        return redirect(route('admin.subareas.index', ['area' => $area]))->with(['message' => 'SubArea creado exitosamente!', 'alert-type' => 'success']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area, Subarea $subarea)
    {
        return view('admin.subareas.edit', ['area' => $area, 'subarea' => $subarea]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubareaRequest $request, Area $area, Subarea $subarea)
    {
        $input = $request->all();
        $input['slug'] = ucfirst($request->name);

        $subarea->update($input);

        return redirect()->route('admin.subareas.index', ['area' => $area])->with(['message' => 'Subarea actualizado exitosamente!', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area, Subarea $subarea)
    {
        $subarea->delete();

        return redirect()->route('admin.subareas.index', ['area' => $area])->with(['message' => 'Subarea eliminado exitosamente!', 'alert-type' => 'error']);
    }
}

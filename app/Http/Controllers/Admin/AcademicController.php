<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Academic;
use App\Http\Requests\AcademicRequest;
use DB;

class AcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academics = DB::table('academics')->get();

        return view('admin.academics.index', ['academics' => $academics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = DB::table('areas')->get();

        return view('admin.academics.create', ['areas' => $areas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AcademicRequest $request)
    {
        $input = $request->all();
        
        if ($request->status == 'on') {
            $input['status'] = true;
        }

        $academic = new Academic($input);
        $academic->save();

        return redirect(route('admin.academics.index'))->with([ 'message' => 'Unidad academica creado exitosamente!', 'alert-type' => 'success' ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Academic $academic)
    {
        $areas = DB::table('areas')->get();

        return view('admin.academics.edit', ['academic' => $academic, 'areas' => $areas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AcademicRequest $request, Academic $academic)
    {
        $input = $request->all();

        if ($request->status == 'on') {
            $input['status'] = true;
        } else {
            $input['status'] = 0;
        }

        $academic->update($input);

        return redirect(route('admin.academics.index'))->with([ 'message' => 'Unidad academica actualizado exitosamente!', 'alert-type' => 'success' ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Academic $academic)
    {
        $academic->delete();

        return redirect()->route('admin.academics.index')->with(['message' => 'Unidad academica eliminado exitosamente!', 'alert-type' => 'success']);
    }
}

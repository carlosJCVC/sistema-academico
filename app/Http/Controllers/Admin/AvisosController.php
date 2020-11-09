<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Aviso;
use App\Http\Requests\AvisoRequest;

class AvisosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avisos = DB::table('avisos')->get();

        return view('admin.avisos.index', [ 'avisos' => $avisos ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.avisos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AvisoRequest $request)
    {
        $input = $request->all();

        if ($request->file != null) {
            $path = $request->file('file')->store('avisos');
    
            $input['file'] = $path;
        }

        $aviso = new Aviso($input);
        $aviso->save();

        return redirect(route('admin.avisos.index'))->with([ 'message' => 'Aviso creado exitosamente!', 'alert-type' => 'success' ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Aviso $aviso)
    {
        return view('admin.avisos.edit', [ 'aviso' => $aviso ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AvisoRequest $request, Aviso $aviso)
    {        
        $aviso->title = $request->title;

        if ($request->file != null) {
            $path = $request->file('file')->store('avisos');
            $aviso->file = $path;    
        }

        $aviso->save();

        return redirect(route('admin.avisos.index'))->with([ 'message' => 'Aviso actuaizado exitosamente!', 'alert-type' => 'success' ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aviso $aviso)
    {
        $aviso->delete();

        return redirect(route('admin.avisos.index'))->with([ 'message' => 'Aviso actuaizado exitosamente!', 'alert-type' => 'danger' ]);
    }
}

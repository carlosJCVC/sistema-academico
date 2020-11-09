<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Announcement;
use App\Models\Calification;
use App\Models\SubCalification;
use App\Http\Requests\RequestSubCalification;
use DB;

class SubCalificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Calification $calification)
    {
        $subcalifications = DB::table('sub_califications')->where('calification_id', $calification->id)->get();
        $total = DB::table('sub_califications')->where('calification_id', $calification->id)->sum('percentage');
        $total = $calification->percentage*100 - ($total*100);

        return view('admin.announcements.subcalifications.index', [ 
            'subcalifications' => $subcalifications,
            'calification' => $calification,
            'total' => $total 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Calification $calification)
    {
        $total = DB::table('sub_califications')->where('calification_id', $calification->id)->sum('percentage');
        $total = $calification->percentage*100 - ($total*100);

        $announcement = Announcement::find($calification->announcement_id);


        return view('admin.announcements.subcalifications.create', [ 
            'announcement' => $announcement,
            'calification' => $calification,
            'total' => $total 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestSubCalification $request, Calification $calification)
    {
        $input = $request->all();
        $total = DB::table('sub_califications')->where('calification_id', $calification->id)->sum('percentage');
        $total = ($total*100)+$request->percentage;

        if ($total > ($calification->percentage*100)) {
            return redirect(route('admin.subcalifications.create', $calification->id))->with([ 
                'message' => 'El porcetaje total a excedido , vuelta a crear la calificacion!', 
                'alert-type' => 'error' 
            ]);
        } else if($request->percentage < 1) {
            return redirect(route('admin.subcalifications.create', $calification->id))->with([ 
                'message' => 'El porcetaje enviado no puede ser menor a 1% , vuelta a crear la calificacion!', 
                'alert-type' => 'error' 
            ]);
        }

        $sub = new SubCalification($input);
        $sub->calification_id = $calification->id;
        $sub->percentage = $request->percentage/100;
        $sub->save();

        return redirect(route('admin.subcalifications.index', $calification->id))->with([ 
            'message' => 'Calificacion creado exitosamente!', 
            'alert-type' => 'success' 
        ]);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Calification $calification, Subcalification $subcalification)
    {
        $total = DB::table('sub_califications')->where('calification_id', $calification->id)->sum('percentage');
        $total = $calification->percentage*100 - ($total*100);

        $announcement = Announcement::find($calification->announcement_id);

        return view('admin.announcements.subcalifications.edit', [ 
            'announcement' => $announcement,
            'calification' => $calification,
            'subcalification' => $subcalification,
            'total' => $total 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calification $calification, Subcalification $subcalification)
    {
        $total = DB::table('sub_califications')->where('calification_id', $calification->id)->sum('percentage');
        $total = $total*100;
        $total = $total - ($subcalification->percentage*100);
        $total = $total + $request->percentage;

        if ($total > ($calification->percentage*100)) {
            return redirect(route('admin.subcalifications.edit', [ 'calification' => $calification->id, 'subcalification' => $subcalification->id]))->with([ 
                'message' => 'El porcetaje total a excedido , vuelta a crear la calificacion!', 
                'alert-type' => 'error' 
            ]);
        }

        $input = $request->all();
        $input['percentage'] = $request->percentage/100;

        $subcalification->update($input);
        $subcalification->save();

        return redirect(route('admin.subcalifications.index', $calification->id))->with([ 
            'message' => 'Calificacion creado exitosamente!', 
            'alert-type' => 'success' 
        ]);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calification $calification, Subcalification $subcalification)
    {
        $subcalification->delete();

        return redirect(route('admin.subcalifications.index', $calification->id))->with([ 
            'message' => 'Subcalificacion eliminado con exito!', 
            'alert-type' => 'error' 
        ]);
    }
}

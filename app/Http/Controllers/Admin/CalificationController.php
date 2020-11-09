<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Announcement;
use App\Models\Calification;
use App\Http\Requests\CalificationRequest;
use DB;

class CalificationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Announcement $announcement)
    {
        $total = DB::table('califications')->where('announcement_id', $announcement->id)->sum('percentage');
        $total = 100-($total*100);

        return view('admin.announcements.califications.create', [ 'announcement' => $announcement, 'total' => $total ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CalificationRequest $request, Announcement $announcement)
    {
        $total = DB::table('califications')->where('announcement_id', $announcement->id)->sum('percentage');
        $total = ($total*100)+$request->percentage;

        if ($total > 100) {
            return redirect(route('admin.data.index', $announcement->id))->with([ 'message' => 'El porcetaje total a excedido , vuelta a crear la calificacion!', 'alert-type' => 'error' ]);
        }

        $input = $request->all();
        $input['announcement_id'] = $announcement->id;
        $input['percentage'] = $request->percentage/100;

        $calification = new Calification($input);
        $calification->save();

        return redirect(route('admin.data.index', $announcement->id))->with([ 'message' => 'Calificacion creado exitosamente!', 'alert-type' => 'success' ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement, Calification $calification)
    {
        $total = DB::table('califications')->where('announcement_id', $announcement->id)->sum('percentage');
        $total = 100-($total*100);

        return View('admin.announcements.califications.edit', [ 'announcement' => $announcement, 'calification' => $calification, 'total' => $total ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CalificationRequest $request, Announcement $announcement, Calification $calification)
    {
        $total = DB::table('califications')->where('announcement_id', $announcement->id)->sum('percentage');
        $total = ($total*100)+$request->percentage;

        if ($total > 100) {
            return redirect(route('admin.data.index', $announcement->id))->with([ 'message' => 'El porcetaje total a excedido , vuelta a crear la calificacion!', 'alert-type' => 'error' ]);
        }

        $input = $request->all();
        $input['percentage'] = $request->percentage/100;

        $calification->update($input);
        $calification->save();

        return redirect(route('admin.data.index', $announcement->id))->with([ 'message' => 'Calification actuaizado exitosamente!', 'alert-type' => 'success' ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement, Calification $calification)
    {
        $calification->delete();

        return redirect(route('admin.data.index', $announcement->id))->with([ 'message' => 'Calificacion eliminado exitosamente!', 'alert-type' => 'error' ]);
    }
}

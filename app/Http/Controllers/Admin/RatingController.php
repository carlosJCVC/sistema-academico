<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Announcement;
use App\Models\Rating;
use App\Http\Requests\RatingRequest;
use DB;

class RatingController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Announcement $announcement)
    {
        $total = DB::table('knowledge_ratings')->where('announcement_id', $announcement->id)->sum('percentage');
        $total = 100-($total*100);

        return view('admin.announcements.ratings.create', [ 
            'announcement' => $announcement, 
            'total' => $total 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RatingRequest $request, Announcement $announcement)
    {
        $total = DB::table('knowledge_ratings')->where('announcement_id', $announcement->id)->sum('percentage');
        $total = ($total*100)+$request->percentage;

        if ($total > 100) {
            return redirect(route('admin.ratings.create', $announcement->id))->with([ 
                'message' => 'El porcetaje total a excedido , vuelta a crear la calificacion!', 
                'alert-type' => 'error' 
            ]);
        } else if($request->percentage < 1) {
            return redirect(route('admin.ratings.create', $announcement->id))->with([ 
                'message' => 'El porcetaje enviado no puede ser menor a 1% , vuelta a crear la calificacion!', 
                'alert-type' => 'error' 
            ]);
        }

        $input = $request->all();
        $input['announcement_id'] = $announcement->id;
        $input['percentage'] = $request->percentage/100;

        $rating = new Rating($input);
        $rating->save();

        return redirect(route('admin.data.index', $announcement->id))->with([ 
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
    public function edit(Announcement $announcement, Rating $rating)
    {
        $total = DB::table('knowledge_ratings')->where('announcement_id', $announcement->id)->sum('percentage');
        $total = 100-($total*100);

        return View('admin.announcements.ratings.edit', [ 
            'announcement' => $announcement, 
            'rating' => $rating, 
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
    public function update(RatingRequest $request, Announcement $announcement, Rating $rating)
    {
        $total = DB::table('knowledge_ratings')->where('announcement_id', $announcement->id)->sum('percentage');
        $total = $total*100;
        $total = $rating->percentage - $total;
        $total = $total+$request->percentage;

        if ($total > 100) {
            return redirect(route('admin.data.index', $announcement->id))->with([ 
                'message' => 'El porcetaje total a excedido , vuelta a crear la calificacion!', 
                'alert-type' => 'error' 
            ]);
        }

        $input = $request->all();
        $input['percentage'] = $request->percentage/100;

        $rating->update($input);
        $rating->save();

        return redirect(route('admin.data.index', $announcement->id))->with([ 
            'message' => 'Calification actuaizado exitosamente!', 
            'alert-type' => 'success' 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement, Rating $rating)
    {
        $rating->delete();

        return redirect(route('admin.data.index', $announcement->id))->with([ 
            'message' => 'Calificacion eliminado exitosamente!', 
            'alert-type' => 'error' 
        ]);
    }
}

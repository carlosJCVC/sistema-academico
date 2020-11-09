<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Announcement;
use App\Models\Rating;
use App\Models\SubRating;
use App\Http\Requests\RequestSubRating;
use DB;

class SubRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Rating $rating)
    {
        $subratings = DB::table('sub_ratings')->where('rating_id', $rating->id)->get();
        $total = DB::table('sub_ratings')->where('rating_id', $rating->id)->sum('percentage');
        $total = $rating->percentage*100 - ($total*100);

        return view('admin.announcements.subratings.index', [ 
            'subratings' => $subratings,
            'rating' => $rating,
            'total' => $total 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Rating $rating)
    {
        $total = DB::table('sub_ratings')->where('rating_id', $rating->id)->sum('percentage');
        $total = $rating->percentage*100 - ($total*100);

        $announcement = Announcement::find($rating->announcement_id);


        return view('admin.announcements.subratings.create', [ 
            'announcement' => $announcement,
            'rating' => $rating,
            'total' => $total 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestSubRating $request, Rating $rating)
    {
        $input = $request->all();
        $total = DB::table('sub_ratings')->where('rating_id', $rating->id)->sum('percentage');
        $total = ($total*100) + $request->percentage;

        if ($total > ($rating->percentage*100)) {
            return redirect(route('admin.subratings.create', $rating->id))->with([ 
                'message' => 'El porcetaje total a excedido , vuelta a crear la calificacion!', 
                'alert-type' => 'error' 
            ]);
        } else if($request->percentage < 1) {
            return redirect(route('admin.subratings.create', $rating->id))->with([ 
                'message' => 'El porcetaje enviado no puede ser menor a 1% , vuelta a crear la calificacion!', 
                'alert-type' => 'error' 
            ]);
        }

        $sub = new SubRating($input);
        $sub->rating_id = $rating->id;
        $sub->percentage = $request->percentage/100;
        $sub->save();

        return redirect(route('admin.subratings.index', $rating->id))->with([ 
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
    public function edit(Rating $rating, SubRating $subrating)
    {
        $total = DB::table('sub_ratings')->where('rating_id', $rating->id)->sum('percentage');
        $total = $rating->percentage*100 - ($total*100);

        $announcement = Announcement::find($rating->announcement_id);

        return view('admin.announcements.subratings.edit', [ 
            'announcement' => $announcement,
            'rating' => $rating,
            'subrating' => $subrating,
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
    public function update(Request $request, Rating $rating, SubRating $subrating)
    {
        $total = DB::table('sub_ratings')->where('rating_id', $rating->id)->sum('percentage');
        $total = $total*100;
        $total = $total - ($subrating->percentage*100);
        $total = $total + $request->percentage;

        if ($total > ($rating->percentage*100)) {
            return redirect(route('admin.subratings.edit', [ 'rating' => $rating->id, 'subrating' => $subrating->id]))->with([ 
                'message' => 'El porcetaje total a excedido , vuelta a crear la calificacion!', 
                'alert-type' => 'error' 
            ]);
        }

        $input = $request->all();
        $input['percentage'] = $request->percentage/100;

        $subrating->update($input);
        $subrating->save();

        return redirect(route('admin.subratings.index', $rating->id))->with([ 
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
    public function destroy(Rating $rating, SubRating $subrating)
    {
        $subrating->delete();

        return redirect(route('admin.subratings.index', $rating->id))->with([ 
            'message' => 'Subcalificacion eliminado con exito!', 
            'alert-type' => 'error' 
        ]);
    }
}

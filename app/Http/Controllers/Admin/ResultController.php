<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Models\SubRating;
use App\Models\SubCalification;

class ResultController extends Controller
{
    public function store(Request $request)
    {
        
        if ($request->type == 'calification') {
            $subitem = SubCalification::find($request->subitem);
        } else {
            $subitem = SubRating::find($request->subitem);
        }

        if ($request->score > $subitem->percentage*100) {
            return redirect(route('admin.postulants.calificate', [
                'announcement' => $request->announcement,
                'postulant' => $request->postulant,
            ]))->with([
                'message' => 'La nota excede el porcentaje de calificacion!', 
                'alert-type' => 'error'
            ]);
        }

        $score = new Result();
        $score->item_id = $request->item;
        $score->subitem_id = $request->subitem;
        $score->postulant_id = $request->postulant;
        $score->announcement_id = $request->announcement;

        if ($request->type == 'calification') {
            $score->score_calification = $request->score;
            $score->table = 'MERIT';
        }
        if ($request->type == 'rating') {
            $score->score_rating = $request->score;
            $score->table = 'KNOWN';
        }

        $score->save();

        return redirect(route('admin.postulants.calificate', [
            'announcement' => $score->announcement_id,
            'postulant' => $score->postulant_id,
        ]))->with([
            'message' => 'Nota agregada exitosamente!', 
            'alert-type' => 'success'
        ]);
    }
}

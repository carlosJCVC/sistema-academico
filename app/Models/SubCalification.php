<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class SubCalification extends Model
{
    protected $table = 'sub_califications';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'percentage', 'calification_id', 'description',
    ];

    public function score($item, $postulant, $announcement, $type)
    {
        $subitem = $this;

        $score = DB::table('results')
            ->where('item_id', $item->id)
            ->where('subitem_id', $subitem->id)
            ->where('postulant_id', $postulant->id)
            ->where('announcement_id', $announcement->id)
            ->where('table', 'MERIT')
            ->first();

        if (is_null($score)) {
            return null;
        }

        $res = 0;
        if (is_null($score->score_calification)) {
            $res = $score->score_rating;
        } else {
            $res = $score->score_calification;
        }

        return  $res;
    }
}

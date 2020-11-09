<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id', 
        'subitem_id', 
        'postulant_id', 
        'announcement_id', 
        'rating_id',
        'score_calification',
        'score_rating',
        'table'
    ];
}

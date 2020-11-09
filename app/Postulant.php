<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Postulant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'item_id', 
        'lastname', 
        'gender', 
        'ci', 
        'cod_sis', 
        'email', 
        'phone',
        'address',
        'nro_certificates',
        'nro_docs',
        'auxiliar_name',
        'status',
        'observations'
    ];

    public function scores($announcement)
    {
        $postulant = $this;
        $data = DB::table('results')
            ->where('announcement_id', $announcement->id)
            ->where('postulant_id', $postulant->id)
            ->get();

        return $data;
    }

    public function scoreCalifications($announcement)
    {
        $score = DB::table('results')
            ->where('postulant_id', $this->id)
            ->where('announcement_id', $announcement->id)
            ->where('table', 'MERIT')
            ->sum('score_calification');

        return $score;
    }

    public function scoreRatings($announcement)
    {
        $score = DB::table('results')
            ->where('postulant_id', $this->id)
            ->where('announcement_id', $announcement->id)
            ->where('table', 'KNOWN')
            ->sum('score_rating');
        
        return $score;
    }
}

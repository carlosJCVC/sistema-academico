<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsignatureGroup extends Model
{
    protected $table = 'asignature_groups';

    protected $fillable = ['group', 'asignature_id'];

    public function teachers()
    {
        return $this->hasMany('App\Models\AsignatureGroupTeacher', 'group_id');
    }

    public function asignature()
    {
        return $this->belongsTo('App\Models\Asignature');
    }
}

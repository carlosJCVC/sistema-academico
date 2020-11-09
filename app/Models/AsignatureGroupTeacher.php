<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsignatureGroupTeacher extends Model
{
    protected $table = 'asignature_groups_teachers';

    protected $fillable = ['group_id', 'teacher', 'titular', 'from', 'to', 'day'];

    public function group()
    {
        return $this->belongsTo('App\Models\AsignatureGroup', 'group_id');
    }

    public function teacherName()
    {
        return $this->belongsTo('App\User', 'teacher');
    }

    public function teacherIsTitular()
    {
        return $this->titular ? 'Horario docente' : 'Horario auxiliar';
    }
}

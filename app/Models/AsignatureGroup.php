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

    public function getTitular()
    {
        $docente = $this->teachers()->where('titular', true)->first();
        return $docente ? $docente->teacher : '';
    }

    public function getAuxiliar()
    {
        $auxiliar = $this->teachers()->where('titular', false)->first();
        return  $auxiliar ? $auxiliar->teacher : '';
    }

    // https://stackoverflow.com/questions/34912265/eloquent-get-only-one-column-as-an-array
    public function getTitularSchedules()
    {
        $titular_schedules = $this->teachers()->where('titular', true)->pluck('schedule')->toArray();
        return  $titular_schedules ?: [];
    }

    public function getAuxiliarSchedules()
    {
        $auxiliar_schedules = $this->teachers()->where('titular', false)->pluck('schedule')->toArray();
        return  $auxiliar_schedules ?: [];
    }
}

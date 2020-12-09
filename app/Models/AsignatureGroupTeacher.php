<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsignatureGroupTeacher extends Model
{
    protected $table = 'asignature_groups_teachers';

    protected $fillable = ['group_id', 'teacher', 'titular', 'schedule'];

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

    public function getSchedule()
    {
        return Schedule::findOrFail($this->schedule);
    }

    public function getStartSchedule()
    {
        $schedule = $this->getSchedule();
        return "{$schedule->from}";
    }

    public function getEndsSchedule()
    {
        $schedule = $this->getSchedule();
        return "{$schedule->to}";
    }

    public function getDaySchedule()
    {
        $schedule = $this->getSchedule();
        return "{$schedule->day}";
    }
}

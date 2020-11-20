<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class WeekReport extends Model
{
    protected $table = 'week_reports';

    protected $fillable = [
        'user',
        'asignature',
        'group',
        'date',
        'bodyclass',
        'resourcesbody',
        'observations',
        'file'
    ];

    protected $dates = [
        'date'
    ];

    public function formatDate()
    {
        return Carbon::parse($this->date)->format('d/m/y');
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::parse($value);
    }

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    public function getGroup()
    {
        return AsignatureGroup::findOrFail($this->group);
    }

    public function getAsignature()
    {
        return Asignature::findOrFail($this->asignature);
    }

    public function formatSchedule()
    {
        $group = $this->getGroup();
        $schedule = $group->teachers()->first();
        $from = $schedule->from;
        $to = $schedule->to;
        $day = $schedule->day;
        return "{$from}-{$to} / {$day}";
    }
}

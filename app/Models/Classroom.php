<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Classroom extends Model
{
    protected $table = 'classrooms';

    protected $fillable = [
        'user',
        'asignature',
        'date_suspended',
        'date_reposition',
        'reason',
        'from',
        'to'
    ];

    public function setDateSuspendedAttribute($value)
    {
        $this->attributes['date_suspended'] = Carbon::parse($value);
    }

    public function setDateRepositionAttribute($value)
    {
        $this->attributes['date_reposition'] = Carbon::parse($value);
    }

    public function getDateSuspendedAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    public function getDateRepositionAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    public function formatDateSuspended()
    {
        return Carbon::parse($this->date_suspended)->format('d/m/y');
    }

    public function formatDateReposition()
    {
        return Carbon::parse($this->date_reposition)->format('d/m/y');
    }

    public function getTeacher()
    {
        return User::findOrFail($this->user);
    }

    public function getAsignature()
    {
        return Asignature::findOrFail($this->asignature);
    }

    public function formatTeacher()
    {
        $teacher = $this->getTeacher();
        return ucfirst("{$teacher->name} {$teacher->lastname}");
    }

    public function formatAsignature()
    {
        $asignature = $this->getAsignature();
        return ucfirst($asignature->name);
    }

    public function formatSchedule()
    {
        $from = $this->from;
        $to = $this->to;
        return "{$from}-{$to}";
    }
}

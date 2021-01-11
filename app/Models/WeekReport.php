<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class WeekReport extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = 'week_reports';

    protected $fillable = [
        'user',
        'asignature',
        'group',
        'date',
        'bodyclass',
        'resourcesbody',
        'observations',
        'has_file',
        'filename',
        'file_path',
    ];

    protected $dates = [
        'date',
        'deleted_at'
    ];

    protected $casts = [
        'has_file' => 'boolean',
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

    public function getTeacher()
    {
        return User::findOrFail($this->user);
    }

    public function getAsignature()
    {
        return Asignature::findOrFail($this->asignature);
    }

    // public function formatSchedule()
    // {
    //     $group = $this->getGroup();
    //     $schedule = $group->teachers()->first();
    //     $from = $schedule->from;
    //     $to = $schedule->to;
    //     $day = $schedule->day;
    //     return "{$from}-{$to} / {$day}";
    // }

    public function getUrlFile()
    {
        return Storage::url($this->file_path);
    }

    public function removeInstanceFile()
    {
        // Storage::delete($this->file_path);
        Storage::disk('public')->delete($this->file_path);
    }

    public static function allRecords()
    {
        $week_reports =  self::all();
        $filtered = $week_reports->filter(function ($report, $key) {
            return $report->existsUser() && $report->existsAsignature() && $report->existsAsignatureGroup();
        });
        return $filtered;
    }

    public function existsAsignature()
    {
        return Asignature::where('id', '=', $this->asignature)->exists();
    }

    public function existsAsignatureGroup()
    {
        return AsignatureGroup::where('id', '=', $this->group)->exists();
    }

    public function existsUser()
    {
        return User::where('id', '=', $this->user)->exists();
    }
}

<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Absence extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = 'absences';

    protected $fillable = [
        'user',
        'reason',
        'date_absence',
        'from',
        'to'
    ];

    protected $dates = ['deleted_at'];

    public function setDateAbsenceAttribute($value)
    {
        $this->attributes['date_absence'] = Carbon::parse($value);
    }

    public function getDateAbsenceAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    public function getUser()
    {
        return User::findOrFail($this->user);
    }

    public function formatUser()
    {
        $user = $this->getUser();
        return ucfirst("{$user->name} {$user->lastname}");
    }

    public function formatDateAbsence()
    {
        return Carbon::parse($this->date_absence)->format('d/m/y');
    }

    public function formatSchedule()
    {
        $from = $this->from;
        $to = $this->to;
        return "{$from}-{$to}";
    }

    public static function allRecords()
    {
        $absences =  self::all();
        $filtered = $absences->filter(function ($report, $key) {
            return $report->existsUser();
        });
        return $filtered;
    }

    public function existsUser()
    {
        return User::where('id', '=', $this->user)->exists();
    }
}

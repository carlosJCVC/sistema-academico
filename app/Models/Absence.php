<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use OwenIt\Auditing\Contracts\Auditable;

class Absence extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'absences';

    protected $fillable = [
        'user',
        'reason',
        'date_absence',
        'from',
        'to'
    ];

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
}

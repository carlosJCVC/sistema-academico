<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Schedule extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from', 'to', 'day',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function presentIn()
    {
        return $this->hasMany('App\Models\AsignatureGroupTeacher', 'schedule');
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($schedule) { // before delete() method call this
            $schedule->presentIn()->each(function ($recordPresent) {
                // cada recordPresent es una instancia de AsignatureGroupTeacher, tonces obtenemos su grupo de materia y la eliminamos
                $recordPresent->getGroupModel()->delete();
            });
        });
        // When restore delete model
        // self::restoring(function ($group) {
        //     $group->teachers()->restore();
        // });
    }

    /**
     * Get the schedule day.
     *
     * @param  string  $value
     * @return string
     */
    public function getDayAttribute($value)
    {
        switch ($value) {
            case 'LU':
                return 'LUNES';
                break;
            case 'MA':
                return 'MARTES';
                break;
            case 'MI':
                return 'MIERCOLES';
                break;
            case 'JU':
                return 'JUEVES';
                break;
            case 'VI':
                return 'VIERNES';
                break;
            case 'SA':
                return 'SABADO';
                break;
            case 'DO':
                return 'DOMINGO';
                break;
        }
    }

    public function formatSchedule()
    {
        return "{$this->day} / {$this->from}-{$this->to}";
    }
}

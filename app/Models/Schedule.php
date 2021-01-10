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

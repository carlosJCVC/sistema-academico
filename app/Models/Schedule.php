<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from', 'to', 'day',
    ];

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

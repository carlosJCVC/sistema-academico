<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Asignature extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'year', 'number',
    ];

    /**
     * Get the schedule day.
     *
     * @param  string  $value
     * @return string
     */
    public function getGestionAttribute($value)
    {
        return "{$this->number}/{$this->year}";
    }

    public function groups()
    {
        return $this->hasMany('App\Models\AsignatureGroup');
    }
}

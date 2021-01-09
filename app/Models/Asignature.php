<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asignature extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'year', 'number',
    ];

    protected $dates = ['deleted_at'];

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

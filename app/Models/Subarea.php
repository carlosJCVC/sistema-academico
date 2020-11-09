<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subarea extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'area_id', 'name', 'slug', 'description',
    ];
}

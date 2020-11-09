<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calification extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'percentage', 'announcement_id', 'description',
    ];

    /**
     * Get the subcalifications for the calification post.
     */
    public function subcalifications()
    {
        return $this->hasMany('App\Models\SubCalification');
    }
}

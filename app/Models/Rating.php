<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'knowledge_ratings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'percentage', 'announcement_id', 'description',
    ];

    /**
     * Get the subratings for the rating post.
     */
    public function subratings()
    {
        return $this->hasMany('App\Models\SubRating');
    }
}

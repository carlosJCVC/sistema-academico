<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'academic_id', 'name', 'slug', 'description',
    ];

    /**
     * Get the comments for the blog post.
     */
    public function announcements()
    {
        return $this->belongsToMany('App\Announcement');
    }
}

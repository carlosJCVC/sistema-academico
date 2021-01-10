<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Area extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'academic_id', 'name', 'slug', 'description',
    ];

    protected $dates = ['deleted_at'];

    /**
     * Get the comments for the blog post.
     */
    public function announcements()
    {
        return $this->belongsToMany('App\Announcement');
    }
}

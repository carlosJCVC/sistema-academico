<?php

namespace App;

use App\Models\Authority;
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

    public function authorities()
    {
        return $this->hasMany(Authority::class);
    }

    // this is a recommended way to declare event handlers
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($area) { // before delete() method call this
            $area->authorities()->each(function ($authority) {
                $authority->delete(); // <-- direct deletion
            });
        });
        // When restore delete model
        self::restoring(function ($area) {
            $area->authorities()->restore();
        });
    }
}

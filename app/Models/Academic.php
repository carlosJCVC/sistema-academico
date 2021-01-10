<?php

namespace App\Models;

use App\Area;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Academic extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'status',
    ];

    protected $dates = ['deleted_at'];

    public function areas()
    {
        return $this->hasMany(Area::class);
    }

    // this is the recommended way for declaring event handlers
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($academic) { // before delete() method call this
            $academic->areas()->each(function ($area) {
                $area->delete(); // <-- direct deletion
            });
        });
        // When restore delete model
        self::restoring(function ($academic) {
            $academic->areas()->restore();
        });
    }
}

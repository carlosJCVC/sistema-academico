<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Traits\HasRoles;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

use \OwenIt\Auditing\Models\Audit;

class User extends Authenticatable implements Auditable
{
    use Notifiable, HasRoles;
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'lastnamemother', 'phone', 'gender', 'ci', 'cod_sis', 'email', 'direction', 'name_matter', 'password', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The announcements that belong to the user.
     */
    public function announcements()
    {
        return $this->belongsToMany('App\Announcement');
    }

    /**
     * Get the files for the user.
     */
    public function files()
    {
        return $this->hasMany('App\File');
    }

    /**
     * The announcements that belong to the user.
     */
    public function getMyAnnouncements()
    {
        return DB::table('announcements')->where('');
    }

    public function checkPermission($permission)
    {
        if (!Gate::check($permission))
            return false;
        else
            return true;
    }

    public function checkPermissions($type = 'or',  $permissions)
    {
        if ($type == 'or') {
            return $this->verifyPermissions($permissions);
        }

        if ($type == 'and') {
            return $this->verifyPermissionsAnd($permissions);
        }

        return false;
    }

    public function verifyPermissions($permissions)
    {
        foreach ($permissions as $permission) {
            if ($this->checkPermission($permission)) {
                return true;
                break;
            }
        }
    }

    public function verifyPermissionsAnd($permissions)
    {
        $res = true;
        foreach ($permissions as $permission) {
            if (!$this->checkPermission($permission)) {
                return false;
            }
        }

        return $res;
    }

    public function getFullNameAttribute()
    {
        return ucfirst("{$this->name} {$this->lastname} {$this->lastnamemother}");
    }

    public function schedules()
    {
        return $this->hasMany('App\Models\AsignatureGroupTeacher', 'teacher');
    }

    public function getAsignaturesAndGroups()
    {
        $schedules = $this->schedules()->get();

        $groups = $schedules->map(function ($schedule) {
            return $schedule->group;
        });

        $asignatures = $groups->map(function ($group) {
            return $group->asignature;
        });

        $out = [
            'asignatures' => $asignatures->unique('id')->values()->makeHidden(['created_at', 'updated_at'])->toArray(),
            'groups' => $groups->unique('id')->values()->makeHidden(['created_at', 'updated_at', 'asignature'])->toArray(),
            'schedules' => $schedules->makeHidden(['created_at', 'updated_at', 'group'])->toArray()
        ];
        return $out;
    }
}

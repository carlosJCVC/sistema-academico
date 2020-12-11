<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use OwenIt\Auditing\Contracts\Auditable;

class Authority extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'area_id', 'user', 'role', 'slug',
    ];

    public function getAuthority()
    {
        return User::findOrFail($this->user);
    }

    public function getCargo()
    {
        return Role::findOrFail($this->role);
    }

    public function formatAuthority()
    {
        $authority = $this->getAuthority();
        return $authority->fullname;
    }

    public function formatCargo()
    {
        $role = $this->getCargo();
        return $role->name;
    }
}

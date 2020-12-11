<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserSessionHistory extends Model
{
    protected $fillable = [
        'user_id',
        'session_id',
        'event',
        'ip_address'
    ];

    public static function getAll()
    {
        return self::orderBy('created_at', 'desc')->get();
    }

    public function getUser()
    {
        return User::findOrFail($this->user_id);
    }

    public function formatUser()
    {
        $user = $this->getUser();
        return $user->fullname;
    }

    public function getRoleUserFiredEvent()
    {
        $user = $this->getUser();
        if (!$user) {
            return '';
        }
        $roles_or_one_role = $user->roles()->pluck('name')->toArray();
        return implode(',', $roles_or_one_role);
    }

    public function formatEvent()
    {
        $event = $this->event;
        switch ($event) {
            case 'login': {
                    return '<span class="badge badge-primary">INICIADO SESSION</span>';
                }
            case 'logout': {
                    return '<span class="badge badge-dark">CERRADO SESSION</span>';
                }
            default:
                return strtoupper($event);
        }
    }

    public function formatDate()
    {
        return $this->created_at->format('d/m/Y');
    }

    public function formatTime()
    {
        // restamos 4 por el timezone a no ser q se configure a nivel de app
        return $this->created_at->subHours(4)->toTimeString();
    }
}

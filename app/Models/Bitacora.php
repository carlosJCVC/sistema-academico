<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \OwenIt\Auditing\Models\Audit;

class Bitacora extends Audit
{
    public static function getAll()
    {
        // ->getModified()
        // $audits = Audit::with('user')->orderBy('created_at', 'desc')->get();
        $audits =  self::with('user')->orderBy('created_at', 'desc')->get();
        return $audits;
        // toy filtrando porque hay una issue, que cada vez de usuario cierra session crea un registro y no quiero mostrar eso
        // return $audits->filter(function ($value, $key) {
        //     if (!array_key_exists('remember_token', $value->getModified()) && $value->event !== 'updated') {
        //         return $value;
        //     }
        // });
    }

    public function getRoleUserFiredEvent()
    {
        $user = $this->user;
        if (!$user) {
            return '';
        }
        $roles_or_one_role = $user->roles()->pluck('name')->toArray();
        return implode(',', $roles_or_one_role);
    }

    public function formatUser()
    {
        $user = $this->user;
        if (!$user) {
            return '';
        }
        return $user->fullname;
    }

    public function formatEvent()
    {
        $event = $this->event;
        switch ($event) {
            case 'created': {
                    return '<span class="badge badge-success">REGISTRO CREADO</span>';
                }
            case 'updated': {
                    return '<span class="badge badge-info">REGISTRO ACTUALIZADO</span>';
                }
            case 'deleted': {
                    return '<span class="badge badge-danger">REGISTRO ELIMINADO</span>';
                }
            default:
                return strtoupper($event);
        }
    }

    public function formatModelAudit()
    {
        $model = $this->auditable_type;
        $baseClass = class_basename($model);
        // https://laravel.com/docs/5.4/localization
        return __($baseClass);
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

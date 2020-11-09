<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Gate;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (!Gate::allows($permission)) {
            return redirect(route('admin.dashboard'))->with([ 'message' => 'No tiene permisos para esta accion!', 'alert-type' => 'error' ]);
        }

        return $next($request);
    }
}

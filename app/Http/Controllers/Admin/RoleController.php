<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Session;
use DB;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {

        $roles = Role::all();

        return view('admin.roles.index', [ 'roles' => $roles ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $permissions = DB::table('permissions')->get();

        return view('admin.roles.create', [ 'permissions' => $permissions ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create(['name' => $request->name]);

        $role->save();

        if ($request->permissions) {
            $role->syncPermissions($request->permissions);
        }

        return redirect(route('admin.roles.index'))->with([ 'message' => 'Role creado exitosamente!', 'alert-type' => 'success' ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit(Role $role)
    {
        $permissions = DB::table('permissions')->get();

        return view('admin.roles.edit', ['role' => $role, 'permissions' => $permissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update(Role $role, RoleRequest $request)
    {
        $role->update([ 'name' => $request->name ]);

        $role->save();

        if ($request->permissions) {
            $role->syncPermissions($request->permissions);
        }

        return redirect(route('admin.roles.index'))->with([ 'message' => 'Role actualizado exitosamente!', 'alert-type' => 'info' ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect(route('admin.roles.index'))->with([ 'message' => 'Role eliminado exitosamente!', 'alert-type' => 'success' ]);
    }
}
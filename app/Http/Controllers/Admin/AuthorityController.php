<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Subarea;
use App\Models\Authority;
use App\Area;
use App\Http\Requests\AuthorityRequest;
use App\User;
use Spatie\Permission\Models\Role;

class AuthorityController extends Controller
{
    public function index(Area $area)
    {
        // $authorities = DB::table('authorities')->where('area_id', $area->id)->get();
        $authorities = Authority::where('area_id', $area->id)->get();
        return view('admin.authorities.index', ['area' => $area, 'authorities' => $authorities]);
    }

    public function create(Area $area)
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.authorities.create', [
            'area' => $area,
            'users' => $users,
            'roles' => $roles
        ]);
    }

    public function store(AuthorityRequest $request, Area $area)
    {
        $input = $request->all();

        $role = Role::findOrFail($input['role']);
        $input['slug'] = str_slug($role->name);
        $input['area_id'] = $area->id;

        $authority = new Authority($input);
        $authority->save();

        return redirect(route('admin.authorities.index', ['area' => $area]))->with(['message' => 'Autoridad creado exitosamente!', 'alert-type' => 'success']);
    }

    public function edit(Area $area, Authority $authority)
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.authorities.edit', [
            'area' => $area,
            'authority' => $authority,
            'users' => $users,
            'roles' => $roles
        ]);
    }

    public function update(AuthorityRequest $request, Area $area, Authority $authority)
    {
        $input = $request->all();
        $role = Role::findOrFail($input['role']);
        $input['slug'] = str_slug($role->name);

        $authority->update($input);

        return redirect()->route('admin.authorities.index', ['area' => $area])->with(['message' => 'Autoridad actualizado exitosamente!', 'alert-type' => 'success']);
    }

    public function destroy(Area $area, Authority $authority)
    {
        $authority->delete();

        return redirect()->route('admin.authorities.index', ['area' => $area])->with(['message' => 'Autoridad eliminado exitosamente!', 'alert-type' => 'error']);
    }
}

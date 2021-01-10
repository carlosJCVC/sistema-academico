<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Session;
use App\Role;
use DB;


class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        Log::info('LOG IN HOME HOME');

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles = DB::table('roles')->get();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $user = User::create($request->all());
        $user->password = (bcrypt($user->password));
        $user->save();
        $user->syncRoles($request->roles);

        return redirect(route('admin.users.index'))->with(['message' => 'Usuario creado exitosamente!', 'alert-type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        $roles = Role::orderBy('display_name', 'asc')->lists('display_name', 'id');
        return view('admin.users.show', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit(User $user)
    {
        $roles = DB::table('roles')->get();

        return view('admin.users.edit', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update(User $user, UserRequest $request)
    {
        $input = $request->all();

        if ($request->password != NULL) {
            $input['password'] = bcrypt($input['password']);
        } else {
            unset($input['password']);
        }

        $user->update($input);
        //$user->save();

        $user->syncRoles($request->roles);

        return redirect(route('admin.users.index'))->with(['message' => 'Usuario actualizado exitosamente!', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        // Session::flash('flash_message3', 'Usuario  ' . $id . ' Eliminado!');

        return redirect()->route('admin.users.index')->with(['message' => 'Usuario eliminado exitosamente!', 'alert-type' => 'info']);
    }
}

<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;

class DocentePermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Listar horarios, 
        // listar unidades académicas, 
        // listar materias, 
        // listar grupos, 
        // informes CRUD, 
        // reposiciones CRUD, 
        // justificaciones CRUD.

        $keys = [9, 13, 25, 29, 33, 34, 35, 36, 38, 39, 40, 41, 42, 43, 44, 45];

        $permissions = Permission::find($keys);
        $docente = Role::find(3);
        $docente->syncPermissions($permissions);
    }
}

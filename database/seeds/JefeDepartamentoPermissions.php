<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;

class JefeDepartamentoPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Listar usuarios,
        // listar horarios, 
        // listar unidades académicas, 
        // listar áreas, 
        // listar autoridades, 
        // listar materias, 
        // listar grupos, 
        // informes CRUD, 
        // planilla de asistencia, 
        // reposiciones CRUD, 
        // justificaciones CRUD,

        $keys = [1, 9, 13, 17, 21, 25, 29, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45];

        $permissions = Permission::find($keys);
        $jefeDepartamento = Role::find(2);
        $jefeDepartamento->syncPermissions($permissions);
    }
}

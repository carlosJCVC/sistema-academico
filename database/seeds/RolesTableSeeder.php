<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Administrador',
            ],
            [
                'name' => 'Jefe de departamento',
            ],
            [
                'name' => 'Docente',
            ],
            [
                'name' => 'Auxiliar',
            ],
            /*
            [
                'name' => 'Decano',
            ],
            [
                'name' => 'Director Académico',
            ],
            [
                'name' => 'DPA',
            ],
            [
                'name' => 'Validador',
            ],
            [
                'name' => 'Calificador',
            ],
            [
                'name' => 'Postulante',
            ],
            */
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            // [
            //     'name' => 'Administrator',
            //     'lastname' => 'Admin',
            //     'phone' => '1254646',
            //     'gender' => 'M',
            //     'ci' => '545646646',
            //     'cod_sis' => '20150558255',
            //     'email' => 'admin@admin.com',
            //     'password' => bcrypt('admin'),
            //     'remember_token' => '',
            // ],
            [
                'name' => 'Bart',
                'lastname' => 'Simpson',
                'phone' => '54564646',
                'gender' => 'M',
                'ci' => '78975554',
                'cod_sis' => '201752178',
                'email' => 'bart@gmail.com',
                'password' => bcrypt('bart'),
                'remember_token' => '',
            ],
            [
                'name' => 'Homero',
                'lastname' => 'Simpson',
                'phone' => '5555555',
                'gender' => 'M',
                'ci' => '78975456',
                'cod_sis' => '201752145',
                'email' => 'homero@homero.com',
                'password' => bcrypt('homero'),
                'remember_token' => '',
            ],
            [
                'name' => 'Lisa',
                'lastname' => 'Simpson',
                'phone' => '2324422',
                'gender' => 'F',
                'ci' => '78975456',
                'cod_sis' => '201752145',
                'email' => 'lisa@lisa.com',
                'password' => bcrypt('lisa'),
                'remember_token' => '',
            ],
            [
                'name' => 'Maggie',
                'lastname' => 'Simpson',
                'phone' => '5555555',
                'gender' => 'F',
                'ci' => '78975456',
                'cod_sis' => '201752145',
                'email' => 'maggie@maggie.com',
                'password' => bcrypt('maggie'),
                'remember_token' => '',
            ],
            [
                'name' => 'Noone',
                'lastname' => 'noname',
                'phone' => '5555555',
                'gender' => 'M',
                'ci' => '78975456',
                'cod_sis' => '201752145',
                'email' => 'noname@noname.com',
                'password' => bcrypt('noname'),
                'remember_token' => '',
            ],
        ];

        foreach ($users as $item) {
            $user = User::create($item);

            // if ($user->name == 'Administrator') {
            //     $user->assignRole(['Admin']);
            // } else {
            //     $user->assignRole(['Jefe de departamento']);
            // }
        }

        $admin = [
            'name' => 'Administrator',
            'lastname' => 'Admin',
            'phone' => '1254646',
            'gender' => 'M',
            'ci' => '545646646',
            'cod_sis' => '20150558255',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'remember_token' => '',
        ];
        $user = User::create($admin);
        $user->assignRole(['Administrador']);

        $jefe = [
            'name' => 'Jimmy',
            'lastname' => 'Villarroel Novillo',
            'phone' => '1254646',
            'gender' => 'M',
            'ci' => '545646646',
            'cod_sis' => '20150558255',
            'email' => 'jefe@jefe.com',
            'password' => bcrypt('jefe'),
            'remember_token' => '',
        ];
        $user = User::create($jefe);
        $user->assignRole(['Jefe de departamento']);

        $docente = [
            'name' => 'Americo',
            'lastname' => 'Fiorilo',
            'phone' => '1254646',
            'gender' => 'M',
            'ci' => '545646646',
            'cod_sis' => '20150558255',
            'email' => 'docente@docente.com',
            'password' => bcrypt('docente'),
            'remember_token' => '',
        ];
        $user = User::create($docente);
        $user->assignRole(['Docente']);

        $auxiliar = [
            'name' => 'Andrez',
            'lastname' => 'Alba',
            'phone' => '1254646',
            'gender' => 'M',
            'ci' => '545646646',
            'cod_sis' => '20150558255',
            'email' => 'auxiliar@auxiliar.com',
            'password' => bcrypt('auxiliar'),
            'remember_token' => '',
        ];
        $user = User::create($auxiliar);
        $user->assignRole(['Auxiliar']);
    }
}

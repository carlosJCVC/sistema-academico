<?php

use Illuminate\Database\Seeder;
use App\User;

class PostulantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Administrator',
                'lastname' => 'Admin',
                'phone' => '1254646',
                'gender' => 'M',
                'ci' => '545646646',
                'cod_sis' => '20150558255',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'remember_token' => '',
            ],
            [
                'name' => 'calificador',
                'lastname' => 'calificador',
                'phone' => '54564646',
                'gender' => 'M',
                'ci' => '145646',
                'cod_sis' => '201682451',
                'email' => 'calificador@gmail.com',
                'password' => bcrypt('calificador'),
                'remember_token' => '',
            ],
            [
                'name' => 'postulante',
                'lastname' => 'postulante',
                'phone' => '54564646',
                'gender' => 'M',
                'ci' => '78975456',
                'cod_sis' => '201752145',
                'email' => 'postulante@gmail.com',
                'password' => bcrypt('postulante'),
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
        ];

        foreach ($users as $item) {
            $user = User::create($item);

            if ($user->name == 'Administrator') {
                $user->assignRole(['Admin']);
            } elseif ($user->name == 'calificador') {
                $user->assignRole(['Comisión conocimiento']);
            } else {
                $user->assignRole(['Comisión méritos']);
            }
        }
    }
}
